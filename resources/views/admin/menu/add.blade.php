@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ trans('menu.menu_add_header') }}</h3>
        </div>
        <div class="card-body">

            <div class="menu-add-content">
                <form action="{{ route('menu.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                    <label>{{ trans('menu.label_name_input') }}</label>
                    <input class="form-control" type="text" name="name" value=""/>
                    </div>
                    <input class="btn btn-success" type="submit" value="{{ trans('menu.label_btn_save') }}"/>
                </form>
            </div>
        </div>
    </div>

@endsection
