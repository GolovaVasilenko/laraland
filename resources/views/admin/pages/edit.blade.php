@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ trans('pages.title_page_edit') }}</h3>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('pages.update') }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label>{{ trans('pages.col_title') }}</label>
                            <input id="slug-source" type="text" name="title" value="{{ $page->translate->title }}" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('pages.col_slug') }}</label>
                            <input id="slug-target" disabled="true" type="text" name="slug" value="{{ $page->slug }}" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('pages.body_label') }}</label>
                            <div class="mb-3">
                                <textarea name="body" class="textarea editor">{{ $page->translate->body }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $page->id }}" />
                            <input type="submit" class="btn btn-success" value="{{ trans('admin.save') }}"/>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-info">
                            <div class="card-header">
                                <h5>SEO</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" value="{{ $page->translate->meta_title }}" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea class="form-control" name="meta_description">{{ $page->translate->meta_description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '.editor' ) )
            .catch( error => {
                console.error( error );
            } );

        $(function(){
            $('#slug-source').friendurl({id : 'slug-target', transliterate: true});
        });

    </script>
@endsection

