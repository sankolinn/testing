<?php

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;
use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Product\ProductRepository;
use App\Repository\Category\CategoryRepositoryInterface;
use Validator;
class ProductController extends Controller
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
        //$products = Product::query()->paginate(5);
        //dd( $prodcuts);
        $products = $this->productRepositoryInterface->get();
        return view('product.lists',array('products' => $products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepositoryInterface->get();
        return view('product.create',array('categories' => $categories));
        // return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name'=>'required',
            'descriptions'=>'required',
            'price'=>'required'
        ]);

        $product = new Product([
            'name' => $request->get('name'),
            'description' => $request->get('descriptions'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category_id'),
            'produced_on' => $request->get('produced_on')
        ]);
        // dd($product);
        $product->save();
        // $request->session()->flash('alert-success', 'User was successful added!');
        return redirect('/products')->with('Success','New Product was successful added!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $products = $this->productRepositoryInterface->getById($id);
        //dd($product);
        return view('product.show',array('product'=>$products));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = $this->productRepositoryInterface->getById($id);
        $categories = $this->categoryRepositoryInterface->get();

        return view('product.edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
                    'name' => 'required',    
                    'description' => 'required',
                    'price' => 'required',
                    'category_id' => 'required',
                    'produced_on' => 'required',
                     ])->validate();

        $products = $this->productRepositoryInterface->update($request->all(), $id);

        return redirect('/products')
        ->with('info', 'Successful updated');
    }

    /**
     * Remove the specified resource fromF storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $products = $this->productRepositoryInterface->destroy($id);
       return redirect()->route('product.index')
       ->with('info', 'Successfully Deleted');
    }
}
