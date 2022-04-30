<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SupplierController;



// Route::get('/', function () {
//     return view('admin.master');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin'],function(){
Route::get('/', function () {
return view('admin.pages.dashboard.dash');
})->name('admin.dashboard');


//  Dashboard
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');

// Employee
Route::get('/employee/index',[EmployeeController::class,'index'])->name('employee.index');
Route::get('/employee/create',[EmployeeController::class,'create'])->name('employee.create');
Route::post('/employee/store',[EmployeeController::class,'store'])->name('employee.store');

// Supplier
Route::get('/supplier/index',[SupplierController::class,'index'])->name('supplier.index');
Route::get('/supplier/create',[SupplierController::class,'create'])->name('supplier.create');
Route::post('/supplier/store',[SupplierController::class,'store'])->name('supplier.store');
});