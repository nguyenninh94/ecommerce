<?php

namespace App\Repositories\Roles;

interface RoleRepositoryInterface
{
	public function filterRole($keyword);

	public function deleteRolePermissions($id);

	public function getPermissions($id);

	public function getPermissionsByRole($id);
}