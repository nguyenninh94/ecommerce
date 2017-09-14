<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title', 'image'];

    public $timestamp = true;
}
