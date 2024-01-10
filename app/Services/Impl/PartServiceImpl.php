<?php

namespace App\Services\Impl;

use App\Models\MaterialType;
use App\Models\Part;
use App\Services\PartService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PartServiceImpl implements PartService
{
    public function returnAllParts(): Collection
    {
        $parts = Part::query()->get();
        return $parts;
    }

    public function returnColumnOfTable(string $tableName): array
    {
        $columns = DB::getSchemaBuilder()->getColumnListing($tableName);
        return $columns;
    }

    public function returnMaterialTypes(): array
    {
        $types = [];

        $material_types = MaterialType::query()->get();

        foreach ($material_types as $material) {
            array_push($types, $material->type);
        }

        return $types;
    }

    public function returnSelects(): array
    {
        $selects = [];

        $material_types = MaterialType::query()->get();

        foreach ($material_types as $material) {
            array_push($selects, $material->type . ' - ' . $material->type_description);
        }

        return $selects;
    }
}
