@extends('admin.master')

@section('content')
<br>

<div class="col-12">
    <h3 class="mb-4 text-center">Edit Employee </h3>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>
                <p class="alert alert-danger">{{ $error }}</p>
            </div>
        @endforeach
    @endif
</div>

    <div class="col-12">
        <div class="card shadow position-relative">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Employee  Informations</h6>
            </div>
            <div class="card-body">

                <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input value="{{ $employee->name}}" name="name" type="text" placeholder="Name" class="form-control">

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input value={{ $employee->email }} name="email" type="text" placeholder="Email" class="form-control">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                <input value="{{ $employee->address }}" name="address" type="text" placeholder="Address" class="form-control">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input value="{{ $employee->phone }}" name="phone" type="number" placeholder="Phone" class="form-control">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">NID</label>
                                <input value="{{ $employee->nid }}" name="nid" type="number" placeholder="NID" class="form-control">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Sallery</label>
                                <input value="{{ $employee->sallery }}" name="sallery" type="number" placeholder="sallery" class="form-control">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Joining Date</label>
                                <input value="{{ $employee->joining_date }}" name="date" type="date" placeholder="Joining Date" class="form-control">

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <img  id="output" height="30" width="50" src="" />
                                <label for="exampleInputEmail1" class="form-label">Image</label>
                                <img src="{{ Storage::url($employee->photo)}}" width="80">
                                <input name="photo" type="file" id="photo" class="form-control" onchange="loadFile(event)" >

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Submit</span>
                    </button>
                    <a href="{{ route('employee.index') }}" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text">Cancel</span>
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection

<script>
var loadFile = function(event){
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
};
</script>
