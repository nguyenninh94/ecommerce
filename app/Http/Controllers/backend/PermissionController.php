<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Permissions\PermissionEloquentRepository;

class PermissionController extends Controller
{
	public $pers;

	public function __construct(PermissionEloquentRepository $pers)
	{
		$this->pers = $pers;
	}
    public function index()
    {
    	$permissions = $this->pers->getAll();
    	return view('backend.views.permissions.index', compact('permissions'));
    }

    public function show($id)
    {
        //
    }

    public function create()
    {
    	return view('backend.views.permissions.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
           'name' => 'required|max:255|unique:permissions,name',
           'display_name' => 'required|max:255',
           'description' => 'required|max:255'
        ]);

        $this->pers->create($data);

        return redirect()->route('permissions.index')->with('success', 'Create Permission Successfully!');
    }

    public function edit($id)
    {
    	$permission = $this->pers->findPermission($id);
    	return view('backend.views.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
         $data = $request->all();

        $this->validate($request, [
           'name' => 'required|max:255|unique:permissions,name,'.$id,
           'display_name' => 'required|max:255',
           'description' => 'required|max:255'
        ]);

        $this->pers->update($id, $data);

        return redirect()->route('permissions.index')->with('success', 'Update Permission Successfully!');
    }

    public function destroy($id)
    {
        $this->pers->delete($id);
        return back()->with('success', 'Delete Permission Successfully!');
    }
}
