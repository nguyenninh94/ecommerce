<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Discounts\DiscountEloquentRepository;

class DiscountController extends Controller
{
    protected $discount;

    public function __construct(DiscountEloquentRepository $discount)
    {
    	$this->discount = $discount;
    }

    public function index()
    {
    	$discounts = $this->discount->getAll();
    	return view('backend.views.discounts.index', compact('discounts'));
    }

    public function create()
    {
    	return view('backend.views.discounts.create');
    }

    public function store(Request $request)
    {
    	$data = $request->all();

    	$this->validate($request, [
           'name' => 'required',
           'value' => 'required|integer',
           'status' => 'required'
    	]);

    	$discount = $this->discount->create($data);

    	return redirect()->route('discounts.index')->with('success', 'Create Discount Successfully!');
    }

    public function edit($id)
    {
    	$discount = $this->discount->find($id);
    	return view('backend.views.discounts.edit', compact('discount'));
    }

    public function update(Request $request, $id)
    {
    	$data = $request->all();

    	$this->validate($request, [
           'name' => 'required',
           'value' => 'required|integer',
           'status' => 'required'
    	]);

    	$this->discount->update($id, $data);

    	return redirect()->route('discounts.index')->with('success', 'Discount Update Successfully!');
    }

    public function destroy($id)
    {
    	$this->discount->delete($id);
    	return back()->with('success', 'Discount Delete Successfully!');
    }
}
