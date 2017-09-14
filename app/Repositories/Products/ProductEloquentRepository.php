<?php

namespace App\Repositories\Products;

use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\EloquentRepository;

class ProductEloquentRepository extends EloquentRepository implements ProductRepositoryInterface
{
	public function getModel()
	{
		 return \App\models\Product::class;
	}

	public function getIdNameProducts()
	{
		return $this->model->pluck('name', 'id');
	}
}    