<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['name', 'status'];

    public $timestamp = true;
}
