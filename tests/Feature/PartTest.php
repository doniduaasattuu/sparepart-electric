<?php

namespace Tests\Feature;

use App\Models\Part;
use App\Models\Product;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\PartSeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PartTest extends TestCase
{
    public function testNullPart()
    {
        $part = Part::query()->find("10003223");
        self::assertNull($part);
    }

    public function testHomepage()
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/')
            ->assertSeeText('AMPERE METER,PZ72-AI,ACREL')
            ->assertSeeText('272');
    }

    public function testPartDetail()
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/part-detail/10000163')
            ->assertSee('10000163')
            ->assertSee('AMPERE METER,PZ72-AI,ACREL')
            ->assertSee('V1 - Manual reord.point w. ext.reqs')
            ->assertSee('6')
            ->assertSee('LEMARI 1 SLOT A')
            ->assertSeeText('The current image (if any) will be replaced.');
    }

    public function testInsertPage()
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/registry-part')
            ->assertSeeText('Fields marked with * are mandatory.')
            ->assertSeeText('Submit');
    }

    public function testInsertSuccess()
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/')
            ->assertDontSeeText('CABLE SCOON,RING SC,90-12MM');

        $this->post('/upsert-part', [
            'id' => '10005890',
            'material_description' => 'CABLE SCOON,RING SC,90-12MM',
            'material_type' => 'ND',
            'qty' => '100',
            'location' => 'LEMARI 1 SLOT 4',
        ])->assertSessionHas('message', 'Material "10005890" successfully saved!');

        $this->get('/')
            ->assertSeeText('10005890')
            ->assertSeeText('CABLE SCOON,RING SC,90-12MM')
            ->assertSeeText('ND')
            ->assertSeeText('100')
            ->assertSeeText('LEMARI 1 SLOT 4');
    }

    public function testInsertDuplicateId()
    {
        $this->seed(DatabaseSeeder::class);

        $this->post('/upsert-part', [
            'id' => '10000037',
            'material_description' => 'FAN,6",220V',
            'material_type' => 'ND',
            'qty' => '16',
            'location' => 'LEMARI 4 SLOT 1',
        ])->assertSessionHas('message', 'Material "10000037" successfully saved!');
    }

    public function testInsertEmpty()
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/')
            ->assertDontSeeText('CABLE SCOON,RING SC,90-12MM');

        $this->post('/upsert-part', [
            'id' => '',
            'material_description' => 'CABLE SCOON,RING SC,90-12MM',
            'material_type' => 'ND',
            'qty' => '100',
            'location' => 'LEMARI 1 SLOT 4',
        ])->assertSessionHas('message', 'Fields marked with * are mandatory!');
    }

    public function testUpdateSucces()
    {
        $this->testInsertSuccess();

        $this->get('/')
            ->assertSeeText('CABLE SCOON,RING SC,90-12MM');

        $this->post('/upsert-part', [
            'id' => '10005890',
            'material_description' => 'CABLE SCOON,RING SC,90-10MM',
            'material_type' => 'ND',
            'qty' => '100',
            'location' => 'LEMARI 1 SLOT 4',
        ])->assertSessionHas('message', 'Successfully updated!');

        $this->get('/')
            ->assertSeeText('CABLE SCOON,RING SC,90-10MM')
            ->assertDontSeeText('CABLE SCOON,RING SC,90-12MM');
    }

    public function testDeleteMaterial()
    {
        $this->testInsertSuccess();

        $this->get('/')
            ->assertSeeText('10005890');

        $this->get('/delete-part/10005890')
            ->assertSessionHas('message', '"CABLE SCOON,RING SC,90-12MM" successfully deleted!');
    }

    public function testDeleteMaterialFailed()
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/delete-part/10012345')
            ->assertSessionHas('message', 'Material 10012345 not found!');
    }

    public function testSearchMaterial()
    {
        $this->testInsertSuccess();

        $this->post('/search-part', [
            'part' => '10005890'
        ])
            ->assertRedirect('/part-detail/10005890');
    }

    public function testSearchMaterialNotFound()
    {
        $this->seed(DatabaseSeeder::class);

        $this->post('/search-part', [
            'part' => '10005890'
        ])
            ->assertSessionHas('message', 'Material "10005890" not found!');
    }
}
