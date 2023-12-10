<?php

namespace Tests\Feature;

use App\Models\Product;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function testGetAllProduct()
    {
        $this->seed([ProductSeeder::class]);

        $products = Product::query()->get();

        self::assertNotNull($products);
        self::assertCount(1000, $products);
    }
}
