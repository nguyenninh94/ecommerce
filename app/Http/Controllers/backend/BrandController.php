<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Brands\BrandEloquentRepository;

class BrandController extends Controller
{
    protected $brand;

    public function __construct(BrandEloquentRepository $brand)
    {
    	$this->brand = $brand;
    }

    public function index()
    {
    	$brands = $this->brand->getAll();
    	return view('backend.views.brands.index', compact('brands'));
    }

    public function create()
    {
    	return view('backend.views.brands.create');
    }

    public function store(Request $request)
    {
    	$data = $request->all();

    	$this->validate($request, [
           'name' => 'required|unique:roles,name',
           'address' => 'required',
           'phone' => 'required',
    	]);

    	$data['slug'] = str_slug($request->name);

    	$brand = $this->brand->create($data);

    	return redirect()->route('brands.index')->with('success', 'Brand Roles Successfully!');
    }

    public function edit($id)
    {
    	$brand = $this->brand->find($id);
    	return view('backend.views.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
    	$data = $request->all();

    	$this->validate($request, [
           'name' => 'required|unique:roles,name,'.$id,
           'address' => 'required',
           'phone' => 'required',
    	]);

    	$data['slug'] = str_slug($request->name);

    	$this->brand->update($id, $data);

    	return redirect()->route('brands.index')->with('success', 'Brand Update Successfully!');
    }

    public function destroy($id)
    {
    	$this->brand->delete($id);
    	return back()->with('success', 'Brand Delete Successfully!');
    }
}
