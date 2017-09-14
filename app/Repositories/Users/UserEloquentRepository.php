<?php

namespace App\Repositories\Users;

use App\Repositories\Users\UserRepositoryInterface;
use App\Repositories\EloquentRepository;
use DB;

class UserEloquentRepository extends EloquentRepository implements UserRepositoryInterface
{
	public function getModel()
	{
		return \App\models\User::class;
	}

	public function deleteUserRoles($id)
	{
		return DB::table('role_user')->where('user_id', $id)->delete();
	}

	public function getRoles($id)
	{
		return $this->find($id)->roles;
	}

	public function getRoleByUser($id)
	{
		return $this->find($id)->roles->pluck('id', 'id')->toArray();
	}
}

