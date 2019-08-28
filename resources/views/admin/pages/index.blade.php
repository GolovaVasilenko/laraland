@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-9">
                    <h3 class="card-title">{{ trans('pages.title_page_list') }}</h3>
                </div>
                <div class="add-page-btn-wrapper col-3">
                    <a href="" class="btn btn-info">{{ trans('pages.add_btn') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"></div>
        <table class="table table-bordered table-striped dataTable" id="example1">
            <thead>
            <tr>
                <th>{{ trans('pages.col_id') }}</th>
                <th>{{ trans('pages.col_title') }}</th>
                <th>{{ trans('pages.col_slug') }}</th>
                <th>{{ trans('pages.col_created') }}</th>
                <th>{{ trans('pages.col_action') }}</th>
            </tr>
            </thead>
        </table>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $('#example1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('pages.data') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'slug', name: 'slug', orderable: false },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'action', name: 'action', orderable: false }
                ]
            });
        });
    </script>
@endsection
