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

    public function deletePart(string $id): bool
    {
        return true;
    }
}
