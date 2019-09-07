@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ trans('menu.menu_list_header') }}</h3>
        </div>
        <div class="card-body">
            <div>
                <a href="{{ route('menu.create') }}" class="btn btn-info">
                    {{ trans('menu.btn_add_menu') }}
                </a>
            </div>
            <p></p>
            <div class="menu-list-content">
                @if($menus->count())
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>{{ trans('menu.label_name') }}</th>
                            <th>{{ trans('menu.label_action') }}</th>
                        </tr>
                        @foreach($menus as $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td><a href="{{ route('menu.items', ['menu_id' => $menu->id]) }}">{{ $menu->name }}</a></td>
                                <td>
                                    <a href="{{ route('menu.items', ['menu_id' => $menu->id]) }}" class="btn btn-success">{{ trans('menu.add_item') }}</a>
                                    <a class="btn btn-info" href="{{ route('menu.edit', ['id' => $menu->id]) }}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger"
                                       href="{{ route('menu.delete', ['id' => $menu->id]) }}"
                                       onClick="if(confirm('Вы уверены ?')) return true; else return false;"
                                    >
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div><h2>{{ trans('menu.empty_data') }}</h2></div>
                @endif
            </div>
        </div>
    </div>
@endsection
