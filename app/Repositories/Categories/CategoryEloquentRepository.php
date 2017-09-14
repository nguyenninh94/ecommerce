<?php

namespace App\Repositories\Categories;

use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\EloquentRepository;

class CategoryEloquentRepository extends EloquentRepository implements CategoryRepositoryInterface
{
	public function getModel()
	{
		  return \App\models\Categories::class;
	}

  public function getIdNameCategories()
  {
      return $this->model->pluck('name', 'id');
  }

  public function getChildrenCategory()
  {
      return $this->model->children;
  }

  public function getCateParent()
  {
      return $this->model->where('parent_id', 0)->get();
  }
}   