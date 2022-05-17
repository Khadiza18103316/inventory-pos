@extends('admin.master')
@section('content')
<br>
 <h3 class="mb-4 text-center">Product List</h3>

    @if(session()->has('msg'))
    <p class="alert alert-danger">{{session()->get('msg')}}</p>
    @endif

    @if(session()->has('success'))
    <p class="alert alert-success">{{session()->get('success')}}</p>
    @endif

    @if(session()->has('message'))
    <p class="alert alert-message">{{session()->get('message')}}</p>
    @endif

    <a href="{{ route('product.create') }}" class="btn btn-primary float-end"><i class="fa fa-plus"></i>Add Product</a>
    <br>
    <br>
    <table class="table table-striped table-bordered table-hover"  width="100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th  scope="col">Image</th>
                <th  scope="col">Name</th>
                <th  scope="col">Category</th>
                <th  scope="col">Supplier</th>
                <th  scope="col">Product Code</th>
                <th  scope="col">Root</th>
                <th  scope="col">Buying Price</th>
                <th  scope="col">Selling Price</th>
                <th  scope="col">Buying Date</th>
                <th  scope="col">Product Quantity</th>
                <th  scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
                <tr>
                    <th>{{ $key + 1 }}</th>
                    <td><img src="{{ Storage::url($product->image)}}" width="80"></td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->category->category_name }}</td>
                    <td>{{ $product->supplier->name }}</td>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->root }}</td>
                    <td>{{ $product->buying_price }}</td>
                    <td>{{ $product->selling_price }}</td>
                    <td>{{ $product->buying_date }}</td>
                    <td>{{ $product->product_quantity }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('product.edit', $product->id) }}">Edit</a>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')" href="{{ route('product.delete', $product->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}

@endsection
