<?php

namespace Accredify\Product\Tests\Unit\Infrastructure\Repositories;

use Accredify\Product\Domain\Models\Product;
use Accredify\Product\Infrastructure\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tests\TestCase;

class ProductRepositoryTest extends TestCase
{
    /** @test */
    public function get_price_returns_price()
    {
        $product = Product::factory()->create();

        $price = (new ProductRepository)->getPrice($product->id);

        $this->assertEquals($product->price, $price);
    }

    /** @test */
    public function get_price_throws_exception()
    {
        $this->expectException(ModelNotFoundException::class);

        (new ProductRepository)->getPrice(1);
    }
}
