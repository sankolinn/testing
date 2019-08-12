<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Product\ProductRepository;
use App\Repository\Product\CategoryRepository;
use App\Repository\Category\CategoryRepositoryInterface;


class CategoryController extends Controller
{
    private $productRepositoryInterface;
    private $categoryRepositoryInterface;

    public function __construct(ProductRepositoryInterface $productRepositoryInterface, CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->productRepositoryInterface = $productRepositoryInterface;
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
        // $this->middleware('auth')->except(['show']);
    }

    
    public function index()
     {
    // 	$categories = Category::all();
    // 	foreach ($categories as $category)
    // 	 {
    // 		dd($categories);
    // 	}
    }

    public function show($id)
    {
        $products = $this->categoryRepositoryInterface->getById($id);
        return view('categories.show', compact('products'));
    // 	$categories = Category::find($id);
    // 	dd($categories);
    }
}
