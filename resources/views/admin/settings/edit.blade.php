@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title_page }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('settings.update') }}" method="post">
                        <div class="form-body">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="hidden" name="id" value="{{ $setting->id }}" />
                            @if(\App\Settings::checkTranslate())
                                <div class="form-group">
                                    <label>Language</label>
                                    <select name="group" class="form-control">
                                        @foreach(config('app.locales') as $lang)
                                            <option value="{{ $lang }}" @if($lang == $setting->lang) selected @endif>{{ $lang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Group</label>
                                <select name="group" class="form-control">
                                    @foreach($groups as $group)
                                        <option value="{{ $group }}" @if($group == $setting->group) selected @endif>{{ $group }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label>Label</label>
                            <input type="text" name="label" class="form-control" value="{{ $setting->label }}" >
                            <label>Name</label>
                            <input type="text" name="key" class="form-control" value="{{ $setting->key }}" >
                            <label>Value</label>
                            <input type="text" name="value" class="form-control" value="{{ $setting->value }}" >
                            <div class="form-group">
                                <label>Type field</label>
                                <select name="type" class="form-control">
                                    @foreach($types as $t)
                                        <option value="{{ $t }}" @if($t == $setting->type) selected @endif>{{ $t }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
