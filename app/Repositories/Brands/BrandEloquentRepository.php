<?php

namespace App\Repositories\Brands;

use App\Repositories\Brands\BrandRepositoryInterface;
use App\Repositories\EloquentRepository;

class BrandEloquentRepository extends EloquentRepository implements BrandRepositoryInterface
{
	public function getModel()
	{
		  return \App\models\Brand::class;
	}

  public function getIdNameBrands()
  {
      return $this->model->pluck('name', 'id');
  }
}   