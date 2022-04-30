@extends('admin.master')

@section('content')

@if(session()->has('message'))
<p class="alert alert-success">
    {{session()->get('message')}}
</p>
@endif

<div class="page-heading"> <br>
    <h3 class="text-center">Dashboard</h3>
</div>

@endsection
