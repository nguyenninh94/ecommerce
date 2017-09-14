<?php

namespace App\Repositories\Permissions;

use App\Repositories\Permissions\PermissionRepositoryInterface;
use App\Repositories\EloquentRepository;

class PermissionEloquentRepository extends EloquentRepository implements PermissionRepositoryInterface
{
	public function getModel()
	{
		return \App\models\Permission::class;
	}

    public function filter($keyword)
    {
      if ($keyword!='') {
            return $this->model->where('name', 'like', '%'.$keyword.'%')
                               ->orWhere('display_name', 'like', '%'.$keyword.'%')
                               ->orderBy('id', 'DESC')->paginate(5);
      }
    }
}   