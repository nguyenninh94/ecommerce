<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class IConSocial extends Model
{
	protected $table = 'icons';

    protected $fillable = ['title', 'links', 'image'];

    public $timestamp = true;
    
}
