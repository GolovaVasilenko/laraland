@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mt-140">
                <div class="card-header">
                    <h3>Add new section</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-collection">
                        New Collection
                    </button>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-gallery">
                        Gallery
                    </button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    @include('admin.sections._forms.collection')
    @include('admin.sections._forms.gallery')
@endsection
