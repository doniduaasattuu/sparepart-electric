<?php

namespace App\Services\Impl;

use App\Services\UtilityService;
use Illuminate\Support\Facades\DB;

class UtilityServiceImpl implements UtilityService
{
    public function returnColumnOfTable(string $tableName): array
    {
        $columns = DB::getSchemaBuilder()->getColumnListing($tableName);
        return $columns;
    }
}
