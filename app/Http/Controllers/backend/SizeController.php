<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Sizes\SizeEloquentRepository;

class SizeController extends Controller
{
    protected $size;

    public function __construct(SizeEloquentRepository $size)
    {
    	$this->size = $size;
    }

    public function index()
    {
    	$sizes = $this->size->getAll();
    	return view('backend.views.sizes.index', compact('sizes'));
    }

    public function create()
    {
    	return view('backend.views.sizes.create');
    }

    public function store(Request $request)
    {
    	$data = $request->all();

    	$this->validate($request, [
           'name' => 'required|unique:sizes,name',
           'status' => 'required'
    	]);

    	$this->size->create($data);

    	return redirect()->route('sizes.index')->with('success', 'Create Size Successfully!');
    }

    public function edit($id)
    {
    	$size = $this->size->findSizes($id);
    	return view('backend.views.sizes.edit', compact('size'));
    }

    public function update(Request $request, $id)
    {
    	$data = $request->all();

    	$this->validate($request, [
           'name' => 'required|unique:colors,name,'.$id,
           'status' => 'required',
    	]);

    	$this->size->update($id, $data);

    	return redirect()->route('sizes.index')->with('success', 'Size Update Successfully!');
    }

    public function destroy($id)
    {
    	$this->size->delete($id);
    	return back()->with('success', 'Size Delete Successfully!');
    }
}
