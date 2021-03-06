@extends('admin.master')
@section('content')
<br>
 <h3 class="mb-4 text-center">Supplier List</h3>

    @if(session()->has('msg'))
    <p class="alert alert-danger">{{session()->get('msg')}}</p>
    @endif

    @if(session()->has('success'))
    <p class="alert alert-success">{{session()->get('success')}}</p>
    @endif

    @if(session()->has('message'))
    <p class="alert alert-message">{{session()->get('message')}}</p>
    @endif

    <a href="{{ route('supplier.create') }}" class="btn btn-primary float-end"><i class="fa fa-plus"></i>Add Supplier</a>
    <br>
    <br>
    <table class="table table-striped table-bordered table-hover"  width="100%">
        <thead>
            <tr>
                <th  width="5%" scope="col">#</th>
                <th  width="12%" scope="col">Image</th>
                <th  width="12%" scope="col">Name</th>
                <th  width="12%" scope="col">Email</th>
                <th  width="12%" scope="col">Address</th>
                <th  width="12%" scope="col">Phone</th>
                <th  width="12%" scope="col">Shop Name</th>
                <th  width="15%" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $key => $supplier)
                <tr>
                    <th>{{ $key + 1 }}</th>
                    <td><img src="{{ Storage::url($supplier->photo)}}" width="80"></td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td>{{ $supplier->phone}}</td>
                    <td>{{ $supplier->shopname }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('supplier.edit', $supplier->id) }}">Edit</a>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')" href="{{ route('supplier.delete', $supplier->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $suppliers->links() }}
@endsection
