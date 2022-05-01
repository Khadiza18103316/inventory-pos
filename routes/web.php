<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\SupplierController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => '/'], function () {

//  Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
});

// Employee
    Route::get('/employee/index', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');


// Supplier
    Route::get('/supplier/index', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');