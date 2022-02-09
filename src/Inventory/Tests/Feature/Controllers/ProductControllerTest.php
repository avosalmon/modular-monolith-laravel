<?php

use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use Laracon\Inventory\Domain\Models\Product;
use Laravel\Sanctum\Sanctum;

use function Pest\Laravel\getJson;

uses(Tests\TestCase::class);

it('returns paginated response', function () {
    Product::factory(30)->create();

    Sanctum::actingAs(User::factory()->create());

    getJson('/inventory-module/products?page=2')
        ->assertOk()
        ->assertJson(fn (AssertableJson $json) =>
            $json->has('data', 10)
                ->has('links')
                ->has('meta')
                ->where('meta.per_page', 10)
                ->where('meta.current_page', 2)
                ->where('meta.last_page', 3)
                ->where('meta.from', 11)
                ->where('meta.to', 20)
                ->where('meta.total', 30)
        );
});
