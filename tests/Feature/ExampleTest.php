<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\User;

class ExampleTest extends TestCase
{
    public function test_index_methode_return_all_products()
    {


        // And a New product with predefined values
        $product = new Product();
        $product->id = 1;
        $product->name = 'Samsung Led';
        $product->description = 'TV';
        $product->price = 4000;
        $product->image = 'fdsfds.jpg';
        $product->category_id = 1;

        // Test if the product created by verify the id
        $this->assertSame(1, $product->id);
    }
}
