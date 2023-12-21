<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialType extends Model
{
    protected $table = 'material_types';
    protected $keyType = 'string';
    protected $primaryKey = 'type';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'type',
        'type_description',
    ];
}
