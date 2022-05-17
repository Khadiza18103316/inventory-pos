<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products=Product::with('category', 'supplier')->latest()->paginate(5);
        return view('admin.pages.product.index',compact('products'));
    }

    public function create(){
    $categories=Category::all();
    $suppliers = Supplier::all();
    return view('admin.pages.product.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'category'=>'required',
            'supplier'=>'required',
            'root'=>'required',
            'code'=>'required',
            'bprice'=>'required',
            'sprice'=>'required',
            'date'=>'required',
            'pquantity'=>'required',
            'image'=>'required|mimes:png,jpeg,jpg',
        ]);

        $path = $request->image->store('public/product');
        Product::create([
            // field name for DB || field name for form
            'product_name' =>$request->name,
            'category_id' =>$request->category,
            'supplier_id' =>$request->supplier,
            'product_code' =>$request->code,
            'root' => $request->root,
            'buying_price' =>$request->bprice,
            'selling_price' =>$request->sprice,
            'buying_date' =>$request->date,
            'product_quantity' =>$request->pquantity,
            'image' =>$path,
        ]);
        return redirect()->route('product.index')->with('success', 'Product Created Successfully!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories=Category::all();
        $suppliers = Supplier::all();

        if ($product) {
            return view('admin.pages.product.edit',compact('product', 'categories', 'suppliers'));
        }
    }

    public function update(Request $request,$id){

        $product = Product::find($id);

        if($request->has('image')){
            $path = $request->image->store('public/product');
        }else{
            $path = $product->image;
        }

        if ($product) {
            $product->update([
            // field name for DB || field name for form
            'product_name' =>$request->name,
            'category_id' =>$request->category,
            'supplier_id' =>$request->supplier,
            'product_code' =>$request->code,
            'root' => $request->root,
            'buying_price' =>$request->bprice,
            'selling_price' =>$request->sprice,
            'buying_date' =>$request->date,
            'product_quantity' =>$request->pquantity,
            'image' =>$path,
            ]);
            return redirect()->route('product.index')->with('message', 'Product Updated Successfully!');
        }
    }

    public function delete($id)
    {
      Product::find($id)->delete();
      return redirect()->route('product.index')->with('msg','product Deleted Successfully!');
    }

}