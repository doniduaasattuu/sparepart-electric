<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

interface PartService
{
    public function returnAllParts(): Collection;

    public function returnColumnOfTable(string $tableName): array;

    public function returnMaterialTypes(): array;

    public function returnSelects(): array;
}
