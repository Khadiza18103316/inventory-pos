<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        return view('admin.pages.supplier.index');
    }

    public function create(){
        return view('admin.pages.supplier.create');
    }
}