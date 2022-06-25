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
                        <li class="breadcrumb-item active">View Level</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Level</h3>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($levels as $index => $level)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $level->name }}</td>
                                            <td>{{ $level->slug }}</td>
                                            <td>{{ $level->status ? 'Active' : 'In Active' }}</td>
                                            <td>
                                                <a href="{{ route('level.edit', ['id' => $level->id]) }}"><i class="fas fa-edit text-primary"></i></a>
                                                <a href=""
                                                    data-href="{{ route('level.destroy', ['id' => $level->id]) }}"
                                                    data-toggle="modal" data-target="#confirm-delete" class="button-active"
                                                    data-modal-title="Delete Info"
                                                    data-modal-description="Are you sure you want to delete the details?"
                                                    data-modal-button="Delete"><i
                                                        class="fas fa-trash text-danger pl-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        @include('admin.layouts.deleteModal', ['type' => 'Level'])
    </section>
@endsection

@push('scripts')
    <script></script>
@endpush
