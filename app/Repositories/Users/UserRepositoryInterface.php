<?php

namespace App\Repositories\Users;

interface UserRepositoryInterface
{

	public function deleteUserRoles($id);

	public function getRoles($id);

	public function getRoleByUser($id);
}