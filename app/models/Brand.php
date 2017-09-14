<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'slug', 'created_at', 'updated_at'];

    public $timestamp = true;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
