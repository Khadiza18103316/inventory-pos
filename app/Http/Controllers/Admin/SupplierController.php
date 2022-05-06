<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index(){
        $suppliers =Supplier::latest()->paginate(5);
        return view('admin.pages.supplier.index',compact('suppliers'));
    }

    public function create(){
        return view('admin.pages.supplier.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required|string|min:3|max:40',
            'email'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric',
            'shopname'=>'required',
            'photo'=>'required|mimes:png,jpeg,jpg',
        ]);

        $path = $request->photo->store('public/supplier');
        Supplier::create([
            // field name for DB || field name for form
            'name' =>$request->name,
            'email' =>$request->email,
            'address' =>$request->address,
            'phone' =>$request->phone,
            'shopname' =>$request->shopname,
            'photo' =>$path,
        ]);
        return redirect()->route('supplier.index')->with('success', 'Supplier Created Successfully!');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        if ($supplier) {
            return view('admin.pages.supplier.edit',compact('supplier'));
        }
    }

    public function update(Request $request,$id){

        $supplier = Supplier::find($id);

        if($request->has('photo')){
            $path = $request->photo->store('public/supplier');
        }else{
            $path = $supplier->photo;
        }

        if ($supplier) {
            $supplier->update([
            'name' =>$request->name,
            'email' =>$request->email,
            'address' =>$request->address,
            'phone' =>$request->phone,
            'shopname' =>$request->shopname,
            'photo' =>$path,
            ]);
            return redirect()->route('supplier.index')->with('message', 'Supplier Updated Successfully!');
        }
    }

    public function delete($id)
    {
     Supplier::find($id)->delete();
      return redirect()->route('supplier.index')->with('msg','Supplier Deleted Successfully!');
    }

}