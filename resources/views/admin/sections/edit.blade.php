@extends('layouts.admin')

@section('content')
    <style>
        .gallery-box {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .image-item-wrapper {
            max-width: 100px;
            overflow: hidden;
            margin: 8px;
        }
        .image-item-wrapper img {
            width: 100%;
            display: block;
            height: auto;
        }
    </style>
    <div class="row">
        <div class="col-6">
            <div class="card mt-140">
                <div class="card-header">>
                    <h3>Edit section</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('section.update') }}" enctype="multipart/form-data">
                    @include('admin.sections._forms.' . $section->type)
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mt-140">
                <div class="card-header">>
                    <h3>Gallery</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="gallery-box">
                    @foreach($media as $image)
                        <div class="image-item-wrapper">
                            <img src="{{ $image->getUrl() }}" />
                        </div>
                    @endforeach
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
