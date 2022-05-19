@extends('admin.master')
@section('content')
<br>

<div class="col-12">
    <h3 class="md-4 text-center">Add Exponse</h3>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div>
        <p class="alert alert-danger">{{$error}}</p>
    </div>
    @endforeach
    @endif
</div>

<div class="col-12">
    <div class="card shadow position-relative">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Exponse Information</h6>
        </div>

        <div class="card-body">
            <form action="{{route('expense.store')}}" method="Post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="details">Details</label>
                            <textarea required name="details" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="amount">Amount</label>
                            <input required type="number" name="amount" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="date">exponse Date</label>
                            <input required type="date" name="date" class="form-control">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-icon-spilt">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Submit</span>
                </button>
                <a href="{{route('expense.index')}}" class="btn btn-danger btn-icon-spilt">
                    <span class="icon text-white-50">
                        <i class="fas fa-times"></i>
                    </span>
                    <span class="text"></span>Cencel</span>
                </a>
            </form>
        </div>
    </div>
</div>

@endsection
