<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreProductPost;
use App\Http\Requests\UpdateProductPost;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('backend/index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend/products/create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductPost $request)
    {
        $validated = $request->validated();

        if($validated){
            $product = new Product;
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->reference = $this->generateRandomString();
            $product->description = $request->description;
            $product->price = $request->price;
            $product->image = $this->imageUpload($request);
            $product->discount = $request->discount;
    
            $product->save();
            return redirect('products/')->withStatus('Data Has Been inserted');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backend/products/show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('backend/products/update', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductPost $request, $id)
    {
        $validated = $request->validated();

        if($validated){
            $product = Product::findOrFail($id);
            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->image = $this->imageUpload($request,$product);
            $product->discount = $request->discount;
    
            $product->save();
            return redirect('products/')->withStatus('Data Has Been updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);   
        $image_path = public_path() . '/images/' . $product->image; 

        if (File::exists($image_path)) {
            unlink($image_path);
        }    
        
        $product->delete();
        return redirect('products/')->withStatus('Data Has Been deleted');
    }

    protected function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function imageUpload(Request $request, $product=null)
    {
        if($product){
            $image_path = public_path() . '/images/' . $product->image; 
            if (File::exists($image_path)) {
                unlink($image_path);
            }
        }

        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images'), $imageName);
   
        return $imageName;
   
    }
}
