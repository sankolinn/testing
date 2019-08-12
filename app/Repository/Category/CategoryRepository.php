<?php
 
namespace App\Repository\Category;

use App\Category;
use App\Product;

class CategoryRepository implements CategoryRepositoryInterface
 {
 	public function get()
 	{
 		$categories = Category::all();
 		return $categories;
 	}
	public function getById($id)
	{
		$products = Product::where('category_id', $id)->paginate(5);
		return $products;
	}
	public function store($data)
	{

	}
	public function edit($id)
	{

	}
	public function update($data)
	{

	}
	public function destroy($id)
	{

	}

 }