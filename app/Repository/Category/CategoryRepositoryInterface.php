<?php

namespace App\Repository\Category;

interface CategoryRepositoryInterface
{
	public function get();//all list
	public function getById($id);
	public function store($data);
	public function edit($id);
	public function update($data);
	public function destroy($id);
}