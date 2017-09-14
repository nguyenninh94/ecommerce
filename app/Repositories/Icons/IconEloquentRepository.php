<?php

namespace App\Repositories\Icons;

use App\Repositories\Icons\IconRepositoryInterface;
use App\Repositories\EloquentRepository;

class IconEloquentRepository extends EloquentRepository implements IconRepositoryInterface
{
	public function getModel()
	{
		 return \App\models\IConSocial::class;
	}

	public function getFolderUploads()
	{
	    $path = public_path() . '/uploads/icons/';
    	return $path;
	}
}   