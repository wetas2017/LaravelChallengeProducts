<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class testProduct extends TestCase
{

    use DatabaseMigrations;
    use WithoutMiddleware;

    public function test_index_methode_return_all_products()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create());

        // And a product object
        $product = factory(App\Product::class)->make();

        //When user submits post request to create product endpoint
        $this->post('/create', $product->toArray());

        //It gets stored in the database
        $this->assertEquals(1, Product::all()->count());
    }
}
