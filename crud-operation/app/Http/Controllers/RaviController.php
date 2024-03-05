<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ravi; 

class RaviController extends Controller
{
    public function index()
    {
        // Retrieve all records from the 'ravi' table using get()
        $raviRecords = Ravi::get();

        // Pass the data to the view
        return view('Products.index', ['raviRecords' => $raviRecords]);
    }


    public function create(){
        return view('Products.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        
     $ravi =new Ravi();
     $ravi -> name=$request->name;
     $ravi -> address=$request->address;
     $ravi->save();
    
     session()->flash('success', 'Product added successfully.');
        return back();
    }
   

    public function edit($id){

        $ravi = Ravi::where('id', $id)->first();
return view('Products.edit',['ravi'=>$ravi]);
}


public function update(Request $request ,$id){


    $ravi = Ravi::where('id',$id)->first(); 
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
    ]);
    

 $ravi -> name=$request->name;
 $ravi -> address=$request->address;
 $ravi->save();

 session()->flash('success', 'Product updated successfully.');
    return back();
}


public function destroy($id)
{

    $ravi=ravi::where('id',$id)->first();
    $ravi->delete();
    session()->flash('success', 'Deleted successfully.');
    return back();
   
}

}