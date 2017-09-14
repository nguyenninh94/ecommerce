<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Categories\CategoryEloquentRepository;

class CategoriesController extends Controller
{
    protected $category;

    public function __construct(CategoryEloquentRepository $category)
    {
    	$this->category = $category;
    }

    public function index()
    {
    	$categories = $this->category->getCateParent();
    	return view('backend.views.categories.index', compact('categories'));
    }

    public function create()
    {
    	$categories = $this->category->getCateParent();
    	return view('backend.views.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
    	$data = $request->all();

    	$data['slug'] = str_slug($request->name);

    	$this->validate($request, [
           'name' => 'required|max:255|unique:categories,name'
    	]);

    	$this->category->create($data);

    	return redirect()->route('categories.index')->with('success', 'Create Category Successfully!');
    }

    public function edit($id)
    {
    	$cate = $this->category->find($id);
    	$categories = $this->category->getCateParent();

    	return view('backend.views.categories.edit', compact('cate', 'categories'));
    }

    public function update(Request $request, $id)
    {
    	$data = $request->all();

    	$data['slug'] = str_slug($request->name);

    	$this->validate($request, [
           'name' => 'required|max:255|unique:categories,name,'.$id
    	]);

    	$this->category->update($id, $data);

    	return redirect()->route('categories.index')->with('success', 'Update Category Successfully!');
    }

    public function destroy($id)
    {   
        $cate = $this->category->find($id);
        
        if ($cate->children->count() > 0)
        {
            return back()->with('error', 'Could not delete this category');
        }

    	$this->category->delete($id);
        return redirect()->route('categories.index')->with('success', 'Delete Category Successfully!');
    }
}
