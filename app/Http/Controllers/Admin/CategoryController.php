<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories =Category::latest()->paginate(5);
        return view('admin.pages.category.index',compact('categories'));
    }

    public function create(){
        return view('admin.pages.category.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required|string|min:3|max:40',
        ]);

        category::create([
            // field name for DB || field name for form
            'category_name' =>$request->name,
        ]);
        return redirect()->route('category.index')->with('success', 'Category Created Successfully!');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if ($category) {
            return view('admin.pages.category.edit',compact('category'));
        }
    }

    public function update(Request $request,$id){

        $category = Category::find($id);
        if ($category) {
            $category->update([
            'category_name' =>$request->name,
            ]);
            return redirect()->route('category.index')->with('message', 'Category Updated Successfully!');
        }
    }

    public function delete($id)
    {
     Category::find($id)->delete();
      return redirect()->route('category.index')->with('msg','Category Deleted Successfully!');
    }
}
