<?php

namespace App\Repositories;
use Illuminate\Http\Request;

abstract class EloquentRepository implements RepositoryInterface
{
	protected $model;

	public function __construct()
	{
		$this->setModel();
	}

	abstract public function getModel();

	public function setModel()
	{
		$this->model = app()->make($this->getModel());
	}

	public function getPaginate()
	{
		return $this->model->orderBy('id', 'DESC')->paginate(5);
		                   //->all();		             
	}

	public function getAll()
	{
		return $this->model->all();
	}

	public function find($id)
	{
		return $this->model->find($id);
	}

	public function findByColumn($att, $column)
	{
		return $this->model->where($att, $column)->get();
	}

	public function create(array $att)
	{
		return $this->model->create($att);
	}

	public function update($id, array $att)
	{
        $result = $this->find($id);
        if($result) {
        	return $result->update($att);
        }
        return false;
	}

	public function delete($id)
	{
		$result = $this->find($id);
		if($result) {
			return $result->delete();
		}
		return false;
	}

	public function saveImage(Request $request)
    {
        $data = $request->all();
        
        if ($request->hasFile('image'))
        {
        	$file = $request->file('image');

        	$imageName = time() . '.' . $file->getClientOriginalName();
        	$destination = $this->getFolderUploads();

        	$file->move($destination, $imageName);

        	$data['image'] = $imageName;
        }

        return $data;
    }

    public function deleteCurrentImage($id)
    {
    	$att = $this->find($id);
        if (!is_null($att->image))
        {
        	$file_path = $this->getFolderUploads() . $att->image;
        	if (file_exists($file_path)) unlink($file_path);
        }

        return true;
    }
}