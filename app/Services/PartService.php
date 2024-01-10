<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

interface PartService
{
    public function returnAllParts(): Collection;

    public function deletePart(string $id): bool;
}
