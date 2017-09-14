<?php

namespace App\Repositories\Discounts;

use App\Repositories\EloquentRepository;
use App\Repositories\Discounts\DiscountRepositoryInterface;

class DiscountEloquentRepository extends EloquentRepository implements DiscountRepositoryInterface
{
	public function getModel()
	{
		return \App\models\Discount::class;
	}

	public function getIdNameDiscounts()
	{
		return $this->model->pluck('value', 'id');
	}
}