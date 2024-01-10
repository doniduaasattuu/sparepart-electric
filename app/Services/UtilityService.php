<?php

namespace App\Services;

interface UtilityService
{
    public function returnColumnOfTable(string $tableName): array;
}
