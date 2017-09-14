<?php

namespace App\Repositories\Categories;

interface CategoryRepositoryInterface
{
	public function getIdNameCategories();

	public function getChildrenCategory();

	public function getCateParent();
}