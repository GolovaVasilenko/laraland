@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h3 class="card-title">Сисок секций</h3>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('section.add') }}" class="btn btn-info">Добавить секцию</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    @if($sections->count() > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя Секции</th>
                            <th>Страница</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sections as $section)
                        <tr>
                            <td>{{ $section->id }}</td>
                            <td>{{ $section->idName }}</td>
                            <td>{{ $section->page->title }}</td>
                            <td>
                                <a class="edit btn btn-info btn-sm" href="{{ route('section.edit', ['id' => $section->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="delete btn btn-danger btn-sm remove-item-js" href="{{ route('section.delete', ['id' => $section->id]) }}">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <h2>Не создано ни одной секции.</h2>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
