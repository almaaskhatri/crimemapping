<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 

use App\Category;
class MapController extends Controller
{
    //

     public function index()
    {
    	$crimes = DB::table('crimes')
            ->join('categories', 'crimes.category_id', '=', 'categories.id')
            ->select('crimes.*', 'categories.name')
            ->get();
            
       $categories=Category::all();
      
        return view('website\map',compact('categories','crimes'));
    }
}
