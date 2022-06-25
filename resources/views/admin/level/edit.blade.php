@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="m-0">Level</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Level</li>
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
                    <div class="card-title">Edit Level</div>
                </div>
                <div class="card-body">
                 <form action="{{route('level.update', ['id' => $level->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                     <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="level">Name</label> <span class="text-danger">*</span>
                                <input type="text" name="level" class="form-control" placeholder="Enter Level" value="{{$level->name}}">
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="level">Status</label> <span class="text-danger">*</span>
                                <select name="status" id="" class="form-control">
                                    <option value="1" selected>Active</option>
                                    <option value="0" {{$level->status ? '' : 'selected'}}>In Active</option>
                                </select>
                            </div>
                         </div>
                     </div>
                     <div class="row ">
                        <div class="col-12">
                            <div class="float-right form-group">
                                <button class="btn btn-primary" id="create-button">
                                   <i class="fa fa-edit"></i> Update 
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