<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['name', 'value', 'status'];

    public $timestamp = true;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
