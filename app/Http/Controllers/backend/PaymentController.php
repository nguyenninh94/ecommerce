<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Payments\PaymentEloquentRepository;

class PaymentController extends Controller
{
    protected $payment;

    public function __construct(PaymentEloquentRepository $payment)
    {
    	$this->payment = $payment;
    }

    public function index()
    {
        $payments = $this->payment->getAll();
        return view('backend.views.payments.index', compact('payments'));
    }

    public function create()
    {
    	 return view('backend.views.payments.create');
    }

    public function store(Request $request)
    {
    	$data = $request->all();

    	$this->validate($request, [
            'name' => 'required|string|max:255|unique:payments,name',
            'image' => 'required|image'
    	]);

    	$this->payment->saveImage($request);

    	$this->payment->create($data);

    	return redirect()->route('payments.index')->with('success', 'Create Payment Successfully!');
    }

    public function edit($id)
    {
    	$payment = $this->payment->find($id);
    	return view('backend.views.payments.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
    	$data = $request->all();

    	$this->validate($request, [
            'name' => 'required|string|max:255|unique:payments,name,'.$id,
            'image' => 'image'
    	]);

        if (!empty($request->image))
        {
            $this->payment->deleteCurrentImage($id);
        }

    	$this->payment->saveImage($request);

    	$this->payment->update($id, $data);

    	return redirect()->route('payments.index')->with('success', 'Update Payment Successfully!');
    }

    public function destroy($id)
    {
    	$this->payment->deleteCurrentImage($id); 

    	$this->payment->delete($id);

    	return back()->with('success', 'Delete Payment Successfully!');
    }

}
