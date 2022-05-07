@extends('admin.master')
@section('content')
<br>
 <h3 class="mb-4 text-center">Employee List</h3>

    @if(session()->has('msg'))
    <p class="alert alert-danger">{{session()->get('msg')}}</p>
    @endif

    @if(session()->has('success'))
    <p class="alert alert-success">{{session()->get('success')}}</p>
    @endif

    @if(session()->has('message'))
    <p class="alert alert-message">{{session()->get('message')}}</p>
    @endif

    <a href="{{ route('employee.create') }}" class="btn btn-primary float-end"><i class="fa fa-plus"></i>Add Employee</a>
    <br>
    <br>
    <table class="table table-striped table-bordered table-hover"  width="100%">
        <thead>
            <tr>
                <th  width="3%"  scope="col">#</th>
                <th  width="10%" scope="col">Image</th>
                <th  width="10%" scope="col">Name</th>
                <th  width="7%"  scope="col">Email</th>
                <th  width="10%" scope="col">Address</th>
                <th  width="10%" scope="col">Phone</th>
                <th  width="10%" scope="col">NID</th>
                <th  width="10%" scope="col">Sallery</th>
                <th  width="10%" scope="col">Joining Date</th>
                <th  width="20%" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $key => $employee)
                <tr>
                    <th>{{ $key + 1 }}</th>
                    <td><img src="{{ Storage::url($employee->photo)}}" width="80"></td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->nid }}</td>
                    <td>{{ $employee->sallery }}</td>
                    <td>{{ $employee->joining_date }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('employee.edit', $employee->id) }}">Edit</a>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')" href="{{ route('employee.delete', $employee->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $employees->links() }}

@endsection
