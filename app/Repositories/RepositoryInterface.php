<?php

namespace App\Repositories;
use Illuminate\Http\Request;

interface RepositoryInterface {

	public function getPaginate();

	public function getAll();

	public function find($id);

	public function findByColumn($att, $column);

	public function delete($id);

	public function create(array $att);

	public function update($id, array $att);

	public function getFolderUploads();

	public function saveImage(Request $request);

	public function deleteCurrentImage($id);
}