@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="m-0">Answer</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Answer</li>
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
                    <div class="card-title">Add Answer</div>
                </div>
                <div class="card-body">
                 <form action="{{route('answer.store')}}" method="POST">
                    @csrf
                     <div class="row">
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
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="answer">Select Answer</label> <span class="text-danger">*</span>
                                <select name="select_answer" id="" class="form-control">
                                    @foreach($options as $option)
                                        <option value="{{$option['value']}}">{{$option['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="answer">First Answer</label> <span class="text-danger">*</span>
                                <input type="number" name="answer[]" maxlength="2" min="1" class="form-control">
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="answer">Second Answer</label> <span class="text-danger">*</span>
                                <input type="number" name="answer[]" maxlength="2" min="1" class="form-control">
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="answer">Third Answer</label> <span class="text-danger">*</span>
                                <input type="number" name="answer[]" maxlength="2" min="1" class="form-control">
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="level">Fourth Answer</label> <span class="text-danger">*</span>
                                <input type="number" name="answer[]" maxlength="2" min="1" class="form-control">
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="level">Status</label> <span class="text-danger">*</span>
                                <select name="status" id="" class="form-control">
                                    <option value="1" selected>Active</option>
                                    <option value="0">In Active</option>
                                </select>
                            </div>
                         </div>
                         <div class="col-6">
                            <div class="float-right form-group mt-4">
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