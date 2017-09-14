<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['name', 'status'];

    public $timestamp = true;
    
}
