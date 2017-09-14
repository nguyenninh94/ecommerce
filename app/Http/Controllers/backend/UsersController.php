<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Users\UserEloquentRepository;
use App\Repositories\Roles\RoleEloquentRepository;
use Hash;

class UsersController extends Controller
{
    protected $user;
    protected $role;

    public function __construct(UserEloquentRepository $user, RoleEloquentRepository $role)
    {
    	$this->user = $user;
    	$this->role = $role;
    }

    public function index()
    {
    	$users = $this->user->getAll();
    	return view('backend.views.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = $this->user->find($id);
        $roles = $this->user->getRoles($id);

        return view('backend.views.users.show', compact('user', 'roles'));
    }

    public function create()
    {
        $roles = $this->role->getAll();
    	return view('backend.views.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
           'name' => 'required|unique:users,name',
           'email' => 'required|email|unique:users,email',
           'phone' => 'required|string|max:20|unique:users,phone',
           'password' => 'required|min:8|confirmed',
           'gender' => 'required',
           'role' => 'required'
        ]);

        $data['password'] = Hash::make($request->password);

        $user = $this->user->create($data);

        if (!empty($request->input('role')))
        {
            foreach ($request->input('role') as $key => $value)
            {
                $user->attachRole($value);
            }
        }

        return redirect()->route('users.index')->with('success', 'Create Users Successfully!');
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        $roles = $this->role->getAll();
        $userRoles = $this->user->getRoleByUser($id);
        return view('backend.views.users.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, $id)
    {
        $user = $this->user->find($id);

        $data = $request->all();

        if($request->password == '') {
            $data = $request->except('password');
        } else {
            $data = $request->all();
        }
        $this->validate($request, [
           'name' => 'required',
           'email' => 'required|email|unique:users,name,'.$id,
           'phone' => 'required|string',
           //'password' => 'min:8|confirmed',
           //'roles' => 'required',
        ]);
        $data['password'] = Hash::make($request->password);

        $this->user->update($id, $data);

        $this->user->deleteUserRoles($id);

        foreach ($request->input('role') as $key => $value) 
        {
            $user->attachRole($value);
        }
        return redirect()->route('users.index')->with('success', 'Update Users Successfully!');
    }

    public function destroy($id)
    {
        $this->user->delete($id);
        return back()->with('success', 'User deleted successfully!');
    }
}
