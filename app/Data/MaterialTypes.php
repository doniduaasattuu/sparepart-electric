<?php

namespace App\Data;

use App\Models\MaterialType;
use Illuminate\Database\Eloquent\Collection;

class MaterialTypes
{
    public function __construct()
    {
        $material_types = MaterialType::query()->get();

        for ($i = 0; $i < sizeof($material_types); $i++) {
            $this->{$material_types[$i]->type} = $material_types[$i]->type_description;
        }
    }

    public function types(): array
    {
        $types = [];

        $material_types = MaterialType::query()->get();

        foreach ($material_types as $material) {
            array_push($types, $material->type);
        }

        return $types;
    }
}
