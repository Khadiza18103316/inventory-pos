@extends('admin.master')
@section('content')
<br>

<h3 class = "mb-4 text-center">Exponse List </h3>

@if(session()->has('success'))
    <p class="alert alert-success">{{session()->get('success')}}</p>
@endif

@if(session()->has('message'))
<p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if(session()->has('msg'))
<p class="alert alert-danger">{{session()->get('msg')}}</p>
@endif

<a href="{{route('expense.create')}}" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i>Add Expense</a>
<br><br>
<table class="table table-striped table-bordered table-hover" width="100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Details</th>
            <th scope="col">Amount</th>
            <th scope="col">Expone Date</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        <tbody>
            @foreach ($expenses as $key=> $expense )
            <tr>
                <th>{{ $key+1 }}</th>
                <td>{{$expense->details}}</td>
                <td>{{$expense->amount}}</td>
                <td>{{$expense->expense_date}}</td>
                <td>
                    <a href="{{route('expense.edit', $expense->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{route('expense.delete',[$expense->id])}}" method="post" onSubmit="return confirm('Do you want to delete?')">@csrf {{method_field('DELETE')}}
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>
{{ $expenses->links() }}
@endsection
