<?php

namespace App\Repositories\Payments;

use App\Repositories\Payments\PaymentRepositoryInterface;
use App\Repositories\EloquentRepository;

class PaymentEloquentRepository extends EloquentRepository implements PaymentRepositoryInterface
{
	public function getModel()
	{
		 return \App\models\Payment::class;
	}

	public function getFolderUploads()
	{
	    $path = public_path() . '/uploads/payments/';
    	return $path;
	}
}   