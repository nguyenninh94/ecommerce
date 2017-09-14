<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Products\ProductEloquentRepository;
use App\Repositories\Categories\CategoryEloquentRepository;
use App\Repositories\Brands\BrandEloquentRepository;
use App\Repositories\Discounts\DiscountEloquentRepository;
use App\Repositories\Sizes\SizeEloquentRepository;
use App\Repositories\Colors\ColorEloquentRepository;

class ProductController extends Controller
{
    protected $product;
    protected $cate;
    protected $brand;
    protected $discount;
    protected $size;
    protected $color;

    public function __construct(ProductEloquentRepository $product, CategoryEloquentRepository $cate, BrandEloquentRepository $brand, DiscountEloquentRepository $discount, SizeEloquentRepository $size, ColorEloquentRepository $color)
    {
    	$this->product = $product;
      $this->cate = $cate;
      $this->brand = $brand;
      $this->discount = $discount;
      $this->size = $size;
      $this->color = $color;
    }

    public function index()
    {
    	$products = $this->product->getAll();
    	return view('backend.views.products.index', compact('products'));
    }

    public function show($id)
    {
       $product = $this->product->find($id);
       $stocks = $product->stocks;
       return view('backend.views.stocks.index', compact('product', 'stocks'));
    }

    public function create()
    {
      $categories = $this->cate->getIdNameCategories();
      $brands = $this->brand->getIdNameBrands();
      $discounts = $this->discount->getIdNameDiscounts();

    	return view('backend.views.products.create', compact('categories', 'brands', 'discounts'));
    }

    public function store(Request $request)
    {
    	$data = $request->all();

    	$this->validate($request, [
           'name' => 'required|unique:products,name',
           'description' => 'required',
           'introduce' => 'required',
           'price' => 'required|integer',
           'material' => 'required',
           //'date_begin_discount' => 'date',
           //'date_end_discount' => 'date',
           'cat_id' => 'required',
           'discount_id' => 'required',
           'brand_id' => 'required',
    	]);

    	$data['slug'] = str_slug($request->name);

    	$this->product->create($data);

    	return redirect()->route('products.index')->with('success', 'Create Product Successfully!');
    }

    public function edit($id)
    {
    	$product = $this->product->find($id);
      $categories = $this->cate->getIdNameCategories();
      $brands = $this->brand->getIdNameBrands();
      $discounts = $this->discount->getIdNameDiscounts();

    	return view('backend.views.products.edit', compact('product', 'categories', 'brands', 'discounts'));
    }

    public function update(Request $request, $id)
    {
    	$data = $request->all();

    	$this->validate($request, [
           'name' => 'required|unique:products,name,'.$id,
           'description' => 'required',
           'introduce' => 'required',
           'price' => 'required|integer',
           'material' => 'required',
           //'date_begin_discount' => 'date',
           //'date_end_discount' => 'date',
           'cat_id' => 'required',
           'discount_id' => 'required',
           'brand_id' => 'required',
        ]);

    	$data['slug'] = str_slug($request->name);

    	$this->product->update($id, $data);

    	return redirect()->route('products.index')->with('success', 'Product Update Successfully!');
    }

    public function destroy($id)
    {
    	$this->product->delete($id);
    	return back()->with('success', 'Product Delete Successfully!');
    }
}
