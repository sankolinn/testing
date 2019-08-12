<?php

namespace App\Repository\Product;

interface ProductRepositoryInterface
{
	public function get();//all list
	public function getById($id);
	public function store($data);
	public function edit($id);
	public function update($data, $id);
	public function destroy($id);
}