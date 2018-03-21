<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function create()
    {
        return view('category/create_category');
    }
    public function store(Request $request)
    {
        $Category= new Category();
        $Category->name=$request->get('category_name');
        $Category->icon=$request->get('icon');
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
        $category= Category::find($id);
        $category->name=$request->get('name');
        $category->icon=$request->get('icon');
        $category->save();
        return redirect('category')->with('success','Information has been  updated');
    }
}
