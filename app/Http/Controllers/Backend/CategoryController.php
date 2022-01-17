<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','check.rol']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('backend/categories/index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:products|max:100',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validated){
            $category = new Category;
            $category->name = sanitize($request->name);
            $category->description = sanitize($request->description);
            $category->image = $this->imageUpload($request);
            $category->save();
            
            return redirect('categories')->withStatus('Data Has Been inserted');
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
        $category = Category::findOrFail($id);
        return view('backend/categories/show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend/categories/update', ['category' => $category]);
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
        $validated = $request->validate([
            'name' => 'required|unique:products|max:100',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validated){
            $category = Category::findOrFail($id);
            $category->image = $this->imageUpload($request,$category);
            $category->name = sanitize($request->name);
            $category->description = sanitize($request->description);
            $category->save();
            
            return redirect('categories')->withStatus('Data Has Been updated');
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
        $category = Category::findOrFail($id);   
        $image_path = public_path() . '/images/' . $category->image; 

        if (File::exists($image_path)) {
            unlink($image_path);
        }   
        
        $category->delete();
        return redirect('categories')->withStatus('Data Has Been deleted');
    }

    public function imageUpload(Request $request, $category=null)
    {
        if($category){
            $image_path = public_path() . '/images/' . $category->image; 
            if (File::exists($image_path)) {
                unlink($image_path);
            }
        }

        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images'), $imageName);
   
        return $imageName;
   
    }
}