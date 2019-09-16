@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Релактировать пункт меню {{ $item->label }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('menu.item.update') }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $item->id }}" />
                <input type="hidden" name="lang" value="{{ \App::getLocale() }}" />
                <input type="hidden" name="position" value="{{ $item->position }}" />
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="label" class="form-control" value="{{ $item->label }}" />
                </div>
                <div class="form-group">
                    <label>Link</label>
                    <input type="text" name="link" class="form-control" value="{{ $item->link }}" />
                </div>
                <input type="submit" value="Save" class="btn btn-success" />
            </form>
        </div>
    </div>
@endsection
