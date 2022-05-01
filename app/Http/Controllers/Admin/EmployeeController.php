<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){
        $employees =Employee::latest()->paginate(5);
        return view('admin.pages.employee.index',compact('employees'));
    }

    public function create(){
        return view('admin.pages.employee.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required|string|min:3|max:40',
            'email'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric|digits:11',
            'sallery'=>'required',
            'nid'=>'required',
            'date'=>'required',
            'photo'=>'required|mimes:png,jpeg,jpg',
        ]);

        $path = $request->photo->store('public/employee');
        Employee::create([
            // field name for DB || field name for form
            'name' =>$request->name,
            'email' =>$request->email,
            'address' =>$request->address,
            'phone' =>$request->phone,
            'nid' =>$request->nid,
            'sallery' =>$request->sallery,
            'joining_date' =>$request->date,
            'photo' =>$path,
        ]);
        return redirect()->route('employee.index')->with('success', 'Employee Created Successfully!');
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            return view('admin.pages.employee.edit',compact('employee'));
        }
    }

    public function update(Request $request,$id){

        $employee = Employee::find($id);

        if($request->has('photo')){
            $path = $request->photo->store('public/employee');
        }else{
            $path = $employee->photo;
        }

        if ($employee) {
            $employee->update([
                'name' =>$request->name,
                'email' =>$request->email,
                'address' =>$request->address,
                'phone' =>$request->phone,
                'nid' =>$request->nid,
                'sallery' =>$request->sallery,
                'joining_date' =>$request->date,
                'photo' =>$path,
            ]);
            return redirect()->route('employee.index')->with('message', 'Employee Updated Successfully!');
        }
    }

    public function delete($id)
    {
      Employee::find($id)->delete();
      return redirect()->route('employee.index')->with('msg','Employee Deleted Successfully!');
    }

}