<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
use Illuminate\Support\Facades\Config;
use DB;

class Roles extends EntrustRole
{
    protected $table = 'roles';

    protected $fillable = ['name', 'display_name', 'description'];

    public function users()
    {
        return $this->belongsToMany(
            Config::get('auth.providers.users.model'), 
            Config::get('entrust.role_user_table'), 
            Config::get('entrust.role_foreign_key'), 
            Config::get('entrust.user_foreign_key'));
    }
}