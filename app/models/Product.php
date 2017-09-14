<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'introduce', 'price', 'material', 'date_begin_discount', 'date_end_discount', 'cat_id', 'discount_id', 'brand_id'];

    public $timestamp = true;

    public function category()
    {
        return $this->belongsTo(Categories::class, 'cat_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
