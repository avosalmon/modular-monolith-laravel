<?php

use App\Models\User;
use Laracon\Inventory\Contracts\DataTransferObjects\Product as ProductDto;
use Laracon\Inventory\Contracts\ProductService;
use Laracon\Order\Domain\Models\{Cart, TaxRate};
use Laracon\Payment\Contracts\PaymentService;
use Laravel\Sanctum\Sanctum;

use function Pest\Laravel\{
    assertDatabaseCount,
    assertDatabaseHas,
    mock,
    postJson,
};

uses(Tests\TestCase::class);

it('creates a new order', function () {
    TaxRate::factory()->create();
    $user = User::factory()->create();
    $cart = Cart::factory()->create([
        'user_id' => $user->id,
    ]);

    $products = collect([
        new ProductDto(1, 'Product 1', 100),
        new ProductDto(2, 'Product 2', 200),
    ]);

    $cart->cartItems()->createMany(
        $products->map(fn (ProductDto $product) => [
            'product_id' => $product->id,
            'quantity' => 1,
        ])
    );

    mock(ProductService::class, function ($mock) use ($products) {
        $products->each(function (ProductDto $product) use ($mock) {
            $mock->shouldReceive('decrementStock')
                ->with($product->id, 1)
                ->once();

            $mock->shouldReceive('getProductById')
                ->with($product->id)
                ->once()
                ->andReturn($product);
        });
    });

    mock(PaymentService::class, function ($mock) {
        $mock->shouldReceive('pay')->once();
    });

    Sanctum::actingAs($user);

    $order = postJson('/order-module/orders', [
        'cart_id' => $cart->id,
        'shipping_address_id' => 1,
        'payment_method' => 'credit-card',
    ])
    ->assertCreated()
    ->json('data');

    assertDatabaseHas('orders', [
        'id' => $order['id'],
    ]);
    assertDatabaseCount('order_lines', 2);
});
