<?php

namespace App\Http\Controllers;
use App\Crime;
use Illuminate\Http\Request;
use App\Category;

use Illuminate\Support\Facades\Validator;

class CrimeController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
    	$categories = Category::all();
       
        return view('crime/create_crime',compact('categories'));
    }
    public function storeCrime(Request $request)
    {
          $validator = Validator::make($request->all(), [
         'address' => 'required|string|max:255',
            'description' => 'required|string|max:500',
 'crime_date_time' => array('required'),
 'category_id' => 'required|integer|max:11',
 'filename' => 'required|mimes:jpeg,bmp,png,gif,svg,mp3,mp4,3gp',
   'longitude' => 'required',
 'latitude' => 'required',
  
     ]);


        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
    	 if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
        $crime= new Crime();
        $crime->address=$request->get('address');
        $crime->description=$request->get('description');
        $crime->crime_date_time=$request->get('crime_date_time');
        $crime->category_id=$request->get('category_id');
        
        $crime->longitude=$request->get('longitude');
        $crime->latitude=$request->get('latitude');
        $crime->filename=$name;

       $crime->save();
        return redirect('crime')->with('success', 'Information has been added');    }
    public function index()
    {
        $crimes=Crime::all();
        return view('crime/crime_index',compact('crimes'));
    }
    public function edit($id)
    {
       $categories = Category::all();
       $crime = crime::find($id);
        
        return view('crime/edit_crime',compact('crime','id','categories'));
    }
    public function destroy($id)
    {
        $crime = crime::find($id);
        $crime->delete();
        return redirect('crime')->with('success','Information has been  deleted');
    }
    public function update(Request $request, $id)
    {
          $validator = Validator::make($request->all(), [
         'address' => 'required|string|max:255',
            'description' => 'required|string|max:500',
 'crime_date_time' => array('required'),
 'category_id' => 'required|integer|max:11',
  'longitude' => 'required',
 'latitude' => 'required',
  
     ]);


        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $crime= Crime::find($id);
        $crime->address=$request->get('address');
        $crime->description=$request->get('description');
        $crime->crime_date_time=$request->get('crime_date_time');
        $crime->category_id=$request->get('category_id');
        $crime->longitude=$request->get('longitude');
        $crime->latitude=$request->get('latitude');
        $crime->save();
        return redirect('crime')->with('success','Information has been  updated');
    }
}
