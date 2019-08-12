<?php
 
namespace App\Repository\Product;

use App\Product;
use Validator;
use App\Category;

class ProductRepository implements ProductRepositoryInterface
 {
 	public function get()
 	{
 		$products = Product::paginate(5);
 		return $products;
 	}
	public function getById($id)
	{
		$product=Product::find($id);
		return $product;
	}
	public function store($data)
	{

	}
	public function edit($id)
	{

		$product=Product::find($id);
		return $product;
	}
	public function update($data, $id)
	{

		$product=Product::find($id);
		$product->update($data);
		return $product;
	}
	public function destroy($id)
	{
		 $products = Product::destroy($id);
        return $products;
	}

 }