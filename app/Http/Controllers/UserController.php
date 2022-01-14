<?php

namespace App\Http\Controllers;

use App\User;
use App\Stock;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $users = User::paginate(10);
        return view('backend/users/index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request)
    {
        $validated = $request->validated();

        if($validated){
            $user = new User;
            $user->rol_id = sanitize($request->rol_id);
            $user->name = sanitize($request->name);
            $user->lastname = sanitize($request->lastname);
            $user->email = sanitize($request->email);
            $user->password = Hash::make($request->password);

            $user->save();

            return redirect('users')->withStatus('Data Has Been inserted');
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
        $user = User::findOrFail($id);
        return view('backend/users/show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend/users/update', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPut $request, $id)
    {
        $validated = $request->validated();

        if($validated){
            $user = User::findOrFail($id);
            $user->name = sanitize($request->name);
            $user->lastname = sanitize($request->lastname);
            $user->rol_id = sanitize($request->rol_id);
            $user->email = sanitize($request->email);
            if($request->password){
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return redirect('users')->withStatus('Data Has Been updated');
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
        $user = User::findOrFail($id);   
        $user->delete();

        return redirect('users')->withStatus('Data Has Been deleted');
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
