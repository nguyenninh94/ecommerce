<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BrandTranslation extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'slug'];
}
