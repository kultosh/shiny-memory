@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="m-0">Operator</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Operator</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="row">
           <div class="col-md-12">
            <div class="card card-secondary">
                <div class="card-header">
                    <div class="card-title">Add Operator</div>
                </div>
                <div class="card-body">
                 <form action="{{route('operator.store')}}" method="POST">
                    @csrf
                     <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="operator">Type First</label> <span class="text-danger">*</span>
                                <select name="type[]" id="" class="form-control">
                                    <option value="" selected disabled>Select First Operator</option>
                                    @foreach($operators as $operator)
                                        <option value="{{$operator->id}}">{{$operator->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="operator">Type Second</label> <span class="text-danger">*</span>
                                <select name="type[]" id="" class="form-control">
                                    <option value="" selected disabled>Select Second Operator</option>
                                    @foreach($operators as $operator)
                                        <option value="{{$operator->id}}">{{$operator->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="operator">Type Third</label> <span class="text-danger">*</span>
                                <select name="type[]" id="" class="form-control">
                                    <option value="" selected disabled>Select Third Operator</option>
                                    @foreach($operators as $operator)
                                        <option value="{{$operator->id}}">{{$operator->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="level">Choose Level</label> <span class="text-danger">*</span>
                                <select name="level" id="" class="form-control">
                                    <option value="" selected disabled>Select Level</option>
                                    @foreach($levels as $level)
                                        <option value="{{$level->id}}">{{$level->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                     </div>
                     <div class="row ">
                        <div class="col-12">
                            <div class="float-right form-group">
                                <button class="btn btn-primary" id="create-button">
                                   <i class="fa fa-plus"></i> Add 
                                </button>
                            </div>
                        </div>
                    </div>
                 </form>
                </div>
            </div>
           </div>
        </div>
    </div>
</section>
@endsection