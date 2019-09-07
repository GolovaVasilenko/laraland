@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ trans('menu.menu_edit_header') }}</h3>
        </div>
        <div class="card-body">
            <div class="menu-add-content">
                <form action="{{ route('menu.update') }}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{ $menu->id }}" />
                    <div class="form-group">
                        <label>{{ trans('menu.label_name_input') }}</label>
                        <input class="form-control" type="text" name="name" value="{{ $menu->name }}"/>
                    </div>
                    <input class="btn btn-success" type="submit" value="{{ trans('menu.label_btn_save') }}"/>
                </form>
            </div>
        </div>
    </div>
@endsection
