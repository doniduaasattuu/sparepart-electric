<?php

namespace Tests\Feature;

use App\Models\Part;
use App\Models\Product;
use Database\Seeders\PartSeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PartTest extends TestCase
{
    public function testNullPart()
    {
        $part = Part::query()->find("10003223");
        self::assertNull($part);
    }
}
