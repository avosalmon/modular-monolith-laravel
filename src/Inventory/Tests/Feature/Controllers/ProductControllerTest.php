<?php

namespace Laracon\Inventory\Tests\Feature\Controllers;

use Laracon\Inventory\Domain\Models\Product;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    /** @test */
    public function index_returns_paginated_response()
    {
        Product::factory(30)->create();

        $response = $this->getJson('/products?page=2')
            ->assertStatus(200)
            ->assertJsonCount(10, 'data')
            ->assertJsonStructure([
                'data',
                'links',
                'meta'
            ])->decodeResponseJson();

        $meta = $response['meta'];
        $this->assertEquals(10, $meta['per_page']);
        $this->assertEquals(2, $meta['current_page']);
        $this->assertEquals(3, $meta['last_page']);
        $this->assertEquals(11, $meta['from']);
        $this->assertEquals(20, $meta['to']);
        $this->assertEquals(30, $meta['total']);
    }
}
