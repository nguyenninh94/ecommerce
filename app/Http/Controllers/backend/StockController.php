<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Stocks\StockEloquentRepository;
use App\Repositories\Products\ProductEloquentRepository;
use App\Repositories\Colors\ColorEloquentRepository;
use App\Repositories\Sizes\SizeEloquentRepository;

class StockController extends Controller
{
    protected $stock;
    protected $product;
    protected $size;
    protected $color;

    public function __construct(StockEloquentRepository $stock, ProductEloquentRepository $product, ColorEloquentRepository $color, SizeEloquentRepository $size)
    {
    	$this->stock = $stock;
        $this->product = $product;
        $this->color = $color;
        $this->size = $size;
    }

    public function index()
    {
    	$stocks = $this->stock->getAll();
    	return view('backend.views.stocks.index', compact('stocks'));
    }

    public function create()
    {
        $products = $this->product->getIdNameProducts();
        $colors = $this->color->getIdNameColors();
        $sizes = $this->size->getIdNameSizes();
    	return view('backend.views.stocks.create', compact('products', 'colors', 'sizes'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'product_id' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'qty' => 'required|integer',
            'image' => 'required}image|mimes:jpg,png,jpeg'
        ]);
        
        $this->stock->saveImage($request);

        $this->stock->create($data);

        return redirect()->route('stocks.index')->with('success', 'Create stock successfully!');
    }

    public function edit($id)
    {
    	$stock = $this->stock->find($id);
        $products = $this->product->getIdNameProducts();
        $colors = $this->color->getIdNameColors();
        $sizes = $this->size->getIdNameSizes();
        return view('backend.views.stocks.edit', compact('stock', 'products', 'colors', 'sizes'));
    }

    public function update(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'product_id' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'qty' => 'required|integer',
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        if (!empty($request->image))
        {
            $this->stock->deleteCurrentImage($id);
        }
        
        $this->stock->saveImage($request);

        $this->stock->update($id, $data);

        return redirect()->route('stocks.index')->with('success', 'Update stock successfully!');
    }

    public function destroy($id)
    {
    	$this->stock->deleteCurrentImage($id); 

        $this->stock->delete($id);

        return back()->with('success', 'Delete Stock Successfully!');
    }
}
