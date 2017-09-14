<?php

namespace App\Repositories\Colors;

use App\Repositories\Colors\ColorRepositoryInterface;
use App\Repositories\EloquentRepository;

class ColorEloquentRepository extends EloquentRepository implements ColorRepositoryInterface
{
	public function getModel()
	{
		  return \App\models\Color::class;
	}

	public function getIdNameColors()
	{
		return $this->model->pluck('name', 'id');
	}
}   