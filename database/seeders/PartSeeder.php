<?php

namespace Database\Seeders;

use App\Models\Part;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parts')->delete();

        $this->call([
            MaterialTypeSeeder::class
        ]);

        Part::create([
            [
                'id' => '10034944',
                'material_description' => 'ISOLATOR,KNICK,P-27000 H1',
                'material_type' => 'ND',
                'qty' => '3',
                'location' => 'LEMARI 5 SLOT A',
            ],
            [
                'id' => '10030628',
                'material_description' => 'POWER METER, PM5350, SCHNEIDER',
                'material_type' => 'ND',
                'qty' => '0',
                'location' => 'LEMARI 1 SLOT A',
            ],
            [
                'id' => '10000163',
                'material_description' => 'AMPERE METER,PZ72-AI,ACREL',
                'material_type' => 'V1',
                'qty' => '6',
                'location' => 'LEMARI 1 SLOT A',
            ],
            [
                'id' => '10000227',
                'material_description' => 'VOLT METER,K3MA-J-A2,100-240V',
                'material_type' => 'V1',
                'qty' => '0',
                'location' => 'LEMARI 1 SLOT B',
            ],
            [
                'id' => '10034455',
                'material_description' => 'DIGITAL PANEL METER,K3MA-F,AC100-240',
                'material_type' => 'ND',
                'qty' => '3',
                'location' => 'LEMARI 1 SLOT B',
            ],
            [
                'id' => '10034636',
                'material_description' => 'MOTOR CONTROLLER,LTMR08MFM+LTMCU',
                'material_type' => 'ND',
                'qty' => '3',
                'location' => 'LEMARI 1 SLOT B',
            ],
            [
                'id' => '10005840',
                'material_description' => 'CABLE SCOON,RING SC,4-5MM',
                'material_type' => 'V1',
                'qty' => '5',
                'location' => 'LEMARI 1 SLOT 4',
            ],
            [
                'id' => '10005843',
                'material_description' => 'CABLE SCOON,RING SC,6MM',
                'material_type' => 'V1',
                'qty' => '10',
                'location' => 'LEMARI 1 SLOT 4',
            ],
            [
                'id' => '10006090',
                'material_description' => 'CABLE SCOON,RING SC,10-8MM',
                'material_type' => 'V1',
                'qty' => '10',
                'location' => 'LEMARI 1 SLOT 4',
            ],
            [
                'id' => '10005828',
                'material_description' => 'CABLE SCOON,RING SC,16-10MM',
                'material_type' => 'V1',
                'qty' => '10',
                'location' => 'LEMARI 1 SLOT 4',
            ],
            [
                'id' => '10005835',
                'material_description' => 'CABLE SCOON,RING SC,25-10MM',
                'material_type' => 'V1',
                'qty' => '15',
                'location' => 'LEMARI 1 SLOT 4',
            ],
            [
                'id' => '10022268',
                'material_description' => 'CABLE SCOON,RING SC,35-10MM',
                'material_type' => 'ND',
                'qty' => '15',
                'location' => 'LEMARI 1 SLOT 4',
            ],
            [
                'id' => '10005838',
                'material_description' => 'CABLE SCOON,RING SC,35-8MM',
                'material_type' => 'V1',
                'qty' => '10',
                'location' => 'LEMARI 1 SLOT 4',
            ],
            [
                'id' => '10005842',
                'material_description' => 'CABLE SCOON,RING SC,50-10MM',
                'material_type' => 'V1',
                'qty' => '10',
                'location' => 'LEMARI 1 SLOT 4',
            ],
            [
                'id' => '10022263',
                'material_description' => 'CABLE SCOON,RING SC,50-14MM',
                'material_type' => 'ND',
                'qty' => '20',
                'location' => 'LEMARI 1 SLOT 4',
            ],
            [
                'id' => '10005846',
                'material_description' => 'CABLE SCOON,RING SC,70-10MM',
                'material_type' => 'V1',
                'qty' => '30',
                'location' => 'LEMARI 1 SLOT 4',
            ],
            [
                'id' => '10043397',
                'material_description' => 'LAMP PILOT,RED,AMP/VOLT METER,LD16-22VA',
                'material_type' => 'ND',
                'qty' => '1',
                'location' => 'LEMARI 1 SLOT 5',
            ],
            [
                'id' => '10000037',
                'material_description' => 'FAN,6",220V',
                'material_type' => 'ND',
                'qty' => '16',
                'location' => 'LEMARI 4 SLOT 1',
            ]
        ]);
    }
}
