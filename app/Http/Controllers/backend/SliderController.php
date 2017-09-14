<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Sliders\SliderEloquentRepository;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderEloquentRepository $slider)
    {
    	$this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->getAll();
        return view('backend.views.sliders.index', compact('sliders'));
    }

    public function create()
    {
    	 return view('backend.views.sliders.create');
    }

    public function store(Request $request)
    {
    	$data = $request->all();

    	$this->validate($request, [
            'title' => 'required|string|max:255|unique:sliders,title',
            'image' => 'required|mimes:jpg,png'
    	]);

    	$this->slider->saveImage($request);

    	$this->slider->create($data);

    	return redirect()->route('sliders.index')->with('success', 'Create Slider Successfully!');
    }

    public function edit($id)
    {
    	$slider = $this->slider->find($id);
    	return view('backend.views.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
    	$data = $request->all();

    	$this->validate($request, [
            'title' => 'required|string|max:255|unique:sliders,title,'.$id,
            'image' => 'required'
    	]);

    	$this->slider->deleteCurrentImage($id);

    	$this->slider->saveImage($request);

    	$this->slider->update($id, $data);

    	return redirect()->route('sliders.index')->with('success', 'Update Slider Successfully!');
    }

    public function destroy($id)
    {
    	$this->slider->deleteCurrentImage($id); 

    	$this->slider->delete($id);

    	return back()->with('success', 'Delete Slider Successfully!');
    }
}
