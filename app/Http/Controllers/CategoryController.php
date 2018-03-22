<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('category/create_category');
    }    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
         'name' => 'required|string|max:255',
            'icon' => 'required|mimes:jpeg,bmp,png,gif,svg',
     ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
         if($request->hasfile('icon'))
         {
            $file = $request->file('icon');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/icons/', $name);
         }
        $Category= new Category();
        $Category->name=$request->get('name');
        $Category->icon=$name;
        $Category->save();
        return redirect('category')->with('success', 'Information has been added');    }
    public function index()
    {
        $categories=Category::all();
        return view('category/category_index',compact('categories'));
    }
    public function edit($id)
    {
       $category = Category::find($id);
        return view('category/edit_category',compact('category','id'));
    }
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect('category')->with('success','Information has been  deleted');
    }
    public function update(Request $request, $id)
    {
          $validator = Validator::make($request->all(), [
         'name' => 'required|string|max:255',
         ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $category= Category::find($id);
        $category->name=$request->get('name');
        $category->save();
        return redirect('category')->with('success','Information has been  updated');
    }
}
