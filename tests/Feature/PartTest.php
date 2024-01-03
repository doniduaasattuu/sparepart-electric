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
            ->assertSeeText('FAN,6",220V')
            ->assertSeeText('18');
    }

    public function testPartDetail()
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/part-detail/10000037')
            ->assertSee('10000037')
            ->assertSee('FAN,6",220V')
            ->assertSee('ND - No planning')
            ->assertSee('16')
            ->assertSee('LEMARI 4 SLOT 1')
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
        ])->assertSessionHas('message', 'Successfully updated!');
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
        $this->seed(DatabaseSeeder::class);

        $this->get('/')
            ->assertSeeText('FAN,6",220V');

        $this->post('/upsert-part', [
            'id' => '10000037',
            'material_description' => 'FAN,8",220V',
            'material_type' => 'ND',
            'qty' => '16',
            'location' => 'LEMARI 4 SLOT 1',
        ])->assertSessionHas('message', 'Successfully updated!');

        $this->get('/')
            ->assertSeeText('FAN,8",220V')
            ->assertDontSeeText('FAN,6",220V');
    }

    public function testDeleteMaterial()
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/')
            ->assertSeeText('10000037');

        $this->get('/delete-part/10000037')
            ->assertSessionHas('message', '"FAN,6",220V" successfully deleted!');
    }

    public function testDeleteMaterialFailed()
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/delete-part/10012345')
            ->assertSessionHas('message', 'Material 10012345 not found!');
    }

    public function testSearchMaterial()
    {
        $this->seed(DatabaseSeeder::class);

        $this->post('/search-part', [
            'part' => '10000037'
        ])
            ->assertRedirect('/part-detail/10000037');
    }

    public function testSearchMaterialNotFound()
    {
        $this->seed(DatabaseSeeder::class);

        $this->post('/search-part', [
            'part' => '10012345'
        ])
            ->assertSessionHas('message', 'Material "10012345" not found!');
    }
}
