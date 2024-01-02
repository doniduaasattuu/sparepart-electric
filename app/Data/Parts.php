<?php

class Parts
{

    public function __construct(
        $material_types
    )''

    public array $selects;
    public array $types;

    foreach ($material_types as $material) {
        array_push($this->selects, $material->type . ' - ' . $material->type_description);
        array_push($this->types, $material->type);
    }
}
