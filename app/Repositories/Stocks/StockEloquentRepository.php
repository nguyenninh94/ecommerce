<?php

namespace App\Repositories\Stocks;

use App\Repositories\Stocks\StockRepositoryInterface;
use App\Repositories\EloquentRepository;

class StockEloquentRepository extends EloquentRepository implements StockRepositoryInterface
{
	public function getModel()
	{
		 return \App\models\Stock::class;
	}

	public function getFolderUploads()
	{
	    $path = public_path() . '/uploads/products/';
    	return $path;
	}
}   