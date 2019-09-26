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

    <!-- Modal Collection Form -->
    <div class="modal fade" id="modal-collection" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Collection</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('section.store') }}" enctype="multipart/form-data">
                        @include('admin.sections._forms.collection')
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END Modal Collection Form -->

    @include('admin.sections._forms.gallery')
@endsection
