<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Roles\RoleEloquentRepository;
use App\Repositories\Permissions\PermissionEloquentRepository;

class RolesController extends Controller
{
    protected $role;
    protected $perms;

    public function __construct(RoleEloquentRepository $role, PermissionEloquentRepository $perms)
    {
    	$this->role = $role;
    	$this->perms = $perms;
    }

    public function index()
    {
    	$roles = $this->role->getAll();
    	return view('backend.views.roles.index' , compact('roles'));

    }

    public function show($id)
    {
    	$role = $this->role->find($id);
    	$permissions = $this->role->getPermissions($id);

    	return view('backend.views.roles.show', compact('role', 'permissions'));
    }

    public function create()
    {
    	$permissions = $this->perms->getAll();
    	return view('backend.views.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

    	$this->validate($request, [
           'name' => 'required|unique:roles,name',
           'display_name' => 'required',
           'description' => 'required',
           //'permission' => 'required'
    	]);

    	$roles = $this->role->create($data);

    	if (!empty($request->input('permission')))
    	{
    		foreach ($request->input('permission') as $key => $value)
    	    {
    		    $roles->attachPermission($value);
    	    }
    	}

    	return redirect()->route('roles.index')->with('success', 'Create Roles Successfully!');
    }

    public function edit($id)
    {
    	$role = $this->role->find($id);
    	$permissions = $this->perms->getAll();
    	$rolePermissions = $this->role->getPermissionsByRole($id);

    	return view('backend.views.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $role = $this->role->find($id);

    	$data = $request->all();

    	$this->validate($request, [
           'name' => 'required|unique:roles,name,'.$id,
           'display_name' => 'required',
           'description' => 'required',
    	]);

    	$this->role->update($id, $data);

    	$this->role->deleteRolePermissions($id);
        
        foreach ($request->input('permission') as $key => $value)
    	{
    		$role->attachPermission($value);
    	}

    	return redirect()->route('roles.index')->with('success', 'Update Roles Successfully!');
    }

    public function destroy($id)
    {
    	$this->role->delete($id);
    	return back()->with('success', 'Role deleted successfully!');
    }
}
