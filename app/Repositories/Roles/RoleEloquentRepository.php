<?php

namespace App\Repositories\Roles;

use App\Repositories\Roles\RoleRepositoryInterface;
use App\Repositories\EloquentRepository;
use DB;

class RoleEloquentRepository extends EloquentRepository implements RoleRepositoryInterface
{
	public function getModel()
	{
		return \App\models\Roles::class;
	}

	public function filterRole($keyword)
	{
		return $this->model->where('name', 'like', '%'.$keyword.'%')
                       ->orWhere('display_name', 'like', '%'.$keyword.'%')
                       ->orderBy('id', 'DESC')->paginate(5);
	}

	public function deleteRolePermissions($id)
	{
		return DB::table('permission_role')->where('roles_id', $id)->delete();
	}

	public function getPermissions($id)
	{
		return $this->find($id)->perms;
	}

	public function getPermissionsByRole($id)
	{
		return $this->find($id)->perms->pluck('id', 'id')->toArray();
	}
}

