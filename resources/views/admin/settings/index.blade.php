@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title_page }}</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-default">
                            Add New Settings
                        </button>
                    </div>
                </div>
                <p></p>
                @foreach($settings as $s)
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">{{ $s->label }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <label>Name</label>
                            <input type="text" name="slug" class="form-control" value="{{ $s->slug }}" placeholder="">
                        </div>
                        <div class="col-6">
                            <label>Value</label>
                            <input type="text" name="value" class="form-control" value="{{ $s->value }}" placeholder="">
                        </div>
                        <div class="col-2">
                            <label>Actions</label><br>
                            <a href="#" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-outline-danger"><i class="fa fa-remove"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="modal fade show" id="modal-default" style="display: none; padding-right: 15px;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Settings</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('settings.store') }}" method="post">
                <div class="modal-body">
                        @csrf
                        <label>Label</label>
                        <input type="text" name="label" class="form-control" >
                        <label>Name</label>
                        <input type="text" name="slug" class="form-control" >
                        <label>Value</label>
                        <input type="text" name="value" class="form-control" >
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection
