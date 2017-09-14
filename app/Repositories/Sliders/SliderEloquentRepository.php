<?php

namespace App\Repositories\Sliders;

use App\Repositories\Sliders\SliderRepositoryInterface;
use App\Repositories\EloquentRepository;

class SliderEloquentRepository extends EloquentRepository implements SliderRepositoryInterface
{
	public function getModel()
	{
		 return \App\models\Slider::class;
	}

	public function getFolderUploads()
	{
	    $path = public_path() . '/uploads/sliders/';
    	return $path;
	}
}   