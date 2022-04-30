@extends('admin.master')
@section('content')
<br>
 <h3 class="mb-4">Supplier List</h3>

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
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Shop Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        {{-- <tbody>
            @foreach ($galleries as $key => $gallery)
                <tr>
                    <th>{{ $key + 1 }}</th>
                    <td><img src="{{ Storage::url($gallery->image)}}" width="80"></td>
                    <td>{{ $gallery->name }}</td>
                    <td>{{ $gallery->category->name }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('gallery.edit', $gallery->id) }}">Edit</a>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')" href="{{ route('gallery.delete', $gallery->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody> --}}
    </table>

@endsection
