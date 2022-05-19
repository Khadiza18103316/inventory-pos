<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index(){
        $expenses= Expense::latest()->paginate(5);
        return view('admin.pages.expense.index', compact('expenses'));
    }

    public function create (){
        return view('admin.pages.expense.create');
    }

    public function store(Request $request){
        $request->validate([
            'details'=>'required',
            'amount'=>'required',
            'date'=> 'required',
        ]);

        Expense::create([
            //field name for DB || field name for form
            'details'=>$request->details,
            'amount'=>$request->amount,
            'expense_date'=>$request->date,
        ]);
        return redirect()->route('expense.index')->with('success', 'Expense Created Successfully!');
    }

    public function edit($id){
        $expense=Expense::find($id);
        if($expense){
            return view('admin.pages.expense.edit', compact('expense'));
        }
    }

    public function update(Request $request, $id){
        $expense=Expense::find($id);
        if($expense){
            $expense->update([
            //field name for DB || field name for form
            'details'=>$request->details,
            'amount'=>$request->amount,
            'expense_date'=>$request->date,
            ]);
            return redirect()->route('expense.index')->with('message', 'Expense Updated Successfully!');

        }
    }
    public function delete($id){
        Expense::find($id)->delete();
        return redirect()->route('expense.index')->with('msg', 'Expense Deleted Successfully!');
    }
}