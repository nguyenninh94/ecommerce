<?php

namespace App\Repositories\Sizes;

use App\Repositories\Sizes\SizesRepositoryInterface;
use App\Repositories\EloquentRepository;

class SizeEloquentRepository extends EloquentRepository implements SizeRepositoryInterface
{
	public function getModel()
	{
		  return \App\models\Size::class;
	}

	public function getIdNameSizes()
	{
		return $this->model->pluck('name', 'id');
	}
}   