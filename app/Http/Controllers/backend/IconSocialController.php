<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Icons\IconEloquentRepository;

class IconSocialController extends Controller
{
    protected $icon;

    public function __construct(IconEloquentRepository $icon)
    {
    	$this->icon = $icon;
    }

    public function index()
    {
        $icons = $this->icon->getAll();
        return view('backend.views.icons.index', compact('icons'));
    }

    public function create()
    {
    	 return view('backend.views.icons.create');
    }

    public function store(Request $request)
    {
    	$data = $request->all();

    	$this->validate($request, [
            'title' => 'required|string|max:255|unique:icons,title',
            'links' => 'required|string|unique:icons,links',
            'image' => 'required|image|mimes:jpg,png'
    	]);

    	$this->icon->saveImage($request);

    	$this->icon->create($data);

    	return redirect()->route('icons.index')->with('success', 'Create Icon Successfully!');
    }

    public function edit($id)
    {
    	$icon = $this->icon->find($id);
    	return view('backend.views.icons.edit', compact('icon'));
    }

    public function update(Request $request, $id)
    {
    	$data = $request->all();

    	$this->validate($request, [
            'title' => 'required|string|max:255|unique:icons,title,'.$id,
            'links' => 'required|string|unique:icons,links,'.$id,
    	]);

    	if (!empty($request->image))
        {
            $this->icon->deleteCurrentImage($id);
        }

    	$this->icon->saveImage($request);

    	$this->icon->update($id, $data);

    	return redirect()->route('icons.index')->with('success', 'Update Icon Successfully!');
    }

    public function destroy($id)
    {
    	$this->icon->deleteCurrentImage($id); 

    	$this->icon->delete($id);

    	return back()->with('success', 'Delete Icon Successfully!');
    }
}
