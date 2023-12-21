<?php

namespace Database\Seeders;

use App\Models\MaterialType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('material_types')->delete();

        MaterialType::create([
            ['type' => 'M0', 'type_description' => 'MPS, fixing type -0-'],
            ['type' => 'M1', 'type_description' => 'MPS, fixing type -1-'],
            ['type' => 'M2', 'type_description' => 'MPS, fixing type -2-'],
            ['type' => 'M3', 'type_description' => 'MPS, fixing type -3-'],
            ['type' => 'M4', 'type_description' => 'MPS, fixing type -4-'],
            ['type' => 'ND', 'type_description' => 'No planning'],
            ['type' => 'P1', 'type_description' => 'MRP, fixing type -1-'],
            ['type' => 'P2', 'type_description' => 'MRP, fixing type -2-'],
            ['type' => 'P3', 'type_description' => 'MRP, fixing type -3-'],
            ['type' => 'P4', 'type_description' => 'MRP, fixing type -4-'],
            ['type' => 'PD', 'type_description' => 'MRP'],
            ['type' => 'R1', 'type_description' => 'Time-phased planning'],
            ['type' => 'R2', 'type_description' => 'Time-phased w.auto.reord.point'],
            ['type' => 'RE', 'type_description' => 'Replenishment plnd externally'],
            ['type' => 'RF', 'type_description' => 'Replenish with dyn. TargetStock'],
            ['type' => 'RP', 'type_description' => 'Replenishment'],
            ['type' => 'RR', 'type_description' => 'Tmphsd. repl. w. dyn.trgt.stck'],
            ['type' => 'RS', 'type_description' => 'Time-phased replenishment plng'],
            ['type' => 'V1', 'type_description' => 'Manual reord.point w. ext.reqs'],
            ['type' => 'V2', 'type_description' => 'Autom. reord.point w. ext.reqs'],
            ['type' => 'VB', 'type_description' => 'Manual reord point planning'],
            ['type' => 'VI', 'type_description' => 'Vendor Managed Inventory'],
            ['type' => 'VM', 'type_description' => 'Automatic reorder point plng'],
            ['type' => 'VS', 'type_description' => 'Seasonal MRP'],
            ['type' => 'VV', 'type_description' => 'Forecast-based planning'],
            ['type' => 'X0', 'type_description' => 'W/O MRP, with BOM Explosion'],
        ]);
    }
}
