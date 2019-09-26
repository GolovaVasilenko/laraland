@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mt-140">
                <div class="card-header">
                    <h3>Edit section</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @foreach($media as $image)
                        <img src="{{ $image->getUrl() }}" />
                    @endforeach
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
