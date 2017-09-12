<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use DB;

class ManufacturerController extends Controller
{
    public function createManufacturer()
    {
        return view('admin.manufacturer.createManufacturer');
    }
    public function storeManufacturer(Request $request)
    {
        
    
        $this->validate($request,[
           'manufacturerName'=>'required',
            'manufacturerDescription'=>'required',
            'publicationStatus'=>'required'
        ]);
        
        DB::table('manufacturers')->insert([
            'manufacturerName'=>$request->manufacturerName,
            'description'=>$request->manufacturerDescription,
            'publicationStatus'=>$request->publicationStatus,
        ]);
        return redirect()->back()->with('message','Manufacturer save successfully');
    }
    
    public function manageManufacturer()
    {
        $manufacturers = Manufacturer::all();
        return view('admin.manufacturer.manageManufacturer',compact('manufacturers'));
    }
    
    public function editManufacturer($id)
    {
        $manufacturerById=Manufacturer::findOrFail($id);
        return view('admin.manufacturer.editManufacturer',compact('manufacturerById'));
    }
     public function updateManufacturer(Request $request)
     {
         $this->validate($request,[
           'manufacturerName'=>'required',
            'manufacturerDescription'=>'required',
            'publicationStatus'=>'required'
        ]);
         $manufacturers=Manufacturer::findOrFail($request->manufacturerId);
         $manufacturers->manufacturerName=$request->manufacturerName;
         $manufacturers->description=$request->manufacturerDescription;
         $manufacturers->publicationStatus=$request->publicationStatus;
         $manufacturers->save();
         return redirect('manufacturer/manage')->with('message','Manufacturer info update successfully');
         
         
         
     }
    
    public function deleteManufacturer($id)
    {
        Manufacturer::findOrFail($id)->delete();
        return redirect('manufacturer/manage')->with('message','Manufacturer info has been updated successfuly.');
    }
}
