<?php

namespace Tests\Feature;

use App\Data\MaterialTypes;
use App\Models\MaterialType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class MaterialTypeTest extends TestCase
{
    public function testMaterialTypeObject()
    {
        $materialType = $this->app->make(MaterialTypes::class);
        self::assertNotNull($materialType);
        Log::info(json_encode($materialType, JSON_PRETTY_PRINT));
        // Log::info(json_encode(MaterialType::query()->get()->toArray(), JSON_PRETTY_PRINT));
    }

    public function testMaterialTypeProperties()
    {
        $materialType = $this->app->make(MaterialTypes::class);
        self::assertEquals("No planning", $materialType->ND);
    }
}
