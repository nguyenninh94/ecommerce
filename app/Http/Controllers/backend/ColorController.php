<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Colors\ColorEloquentRepository;

class ColorController extends Controller
{
    protected $color;

    public function __construct(ColorEloquentRepository $color)
    {
    	$this->color = $color;
    }

    public function index()
    {
    	$colors = $this->color->getAll();
    	return view('backend.views.colors.index', compact('colors'));
    }

    public function create()
    {
    	return view('backend.views.colors.create');
    }

    public function store(Request $request)
    {
    	$data = $request->all();

    	$this->validate($request, [
           'name' => 'required|unique:colors,name',
           'status' => 'required'
    	]);

    	$this->color->create($data);

    	return redirect()->route('colors.index')->with('success', 'Create Color Successfully!');
    }

    public function edit($id)
    {
    	$color = $this->color->find($id);
    	return view('backend.views.colors.edit', compact('color'));
    }

    public function update(Request $request, $id)
    {
    	$data = $request->all();

    	$this->validate($request, [
           'name' => 'required|unique:colors,name,'.$id,
           'status' => 'required',
    	]);

    	$this->color->update($id, $data);

    	return redirect()->route('colors.index')->with('success', 'Color Update Successfully!');
    }

    public function destroy($id)
    {
    	$this->color->delete($id);
    	return back()->with('success', 'Color Delete Successfully!');
    }
}
