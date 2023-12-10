<?php

namespace Tests\Feature;

use App\Models\Product;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testHome()
    {
        $this->seed([ProductSeeder::class]);

        $products = Product::query()
            ->orderBy('id', "DESC")
            ->get();

        $this->view('home', [
            'title' => 'Data Products',
            'products' => $products,
            'total' => count($products),
        ])
            ->assertSeeText("Data Products");
    }

    public function testScanner()
    {
        $this->seed([ProductSeeder::class]);

        $products = Product::query()
            ->orderBy('id', "DESC")
            ->get();

        $this->view('utility.scanner', [
            'title' => 'Scan Product',
        ])
            ->assertSeeText("Scan Product")
            ->assertSeeText("Request Camera Permissions");
    }
}
