@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3>Список пунктов меню {{ $menu->name }}</h3>
                </div>
                <div class="card-body">
                    @if($menu->menuItems->count())
                        <div id="menu-tree" class="menu-items nestable-lists">
                            <div class="dd" id="nestable">
                                @widget('MenuSortableWidget', ['name' => $menu->name ])
                            </div>
                        </div>
                    @else
                        <h3>елементов пока нет</h3>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3>Добавить пункт меню</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('menu.item.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="menu_id" value="{{ $menu->id }}" />
                        <input type="hidden" name="lang" value="{{ \App::getLocale() }}" />
                        <input type="hidden" name="position" value="{{ $menu->menuItems->count() + 1 }}" />
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="label" class="form-control" value="" />
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" name="link" class="form-control" value="" />
                        </div>
                        <div class="form-group">
                            <select name="parent_id" class="form-control">
                                <option value="0">Root</option>
                                @foreach($menu->menuItems as $item)
                                    <option value="{{ $item->id }}">{{ $item->label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Save" class="btn btn-success" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
