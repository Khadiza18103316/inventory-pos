<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        return view('admin.pages.employee.index');
    }

    public function create(){
        return view('admin.pages.employee.create');
    }
}
