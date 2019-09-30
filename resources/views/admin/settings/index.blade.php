@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title_page }}</h3>
                    <div class="ml-auto">
                        <button class="btn btn-outline-primary float-sm-right" data-toggle="modal" data-target="#modal-default">
                            {{ trans('settings.add_button') }}
                        </button>
                    </div>
                    <ul class="nav nav-pills ml-auto p-2">
                        @foreach($groups as $key => $group)
                        <li class="nav-item"><a class="nav-link @if($key == 0) active @endif" href="#{{ $group }}" data-toggle="tab">{{ trans('settings.'.$group) }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.card-header -->

                 <div class="card-body">
                    <div class="tab-content">
                        @foreach($groups as $key => $g)
                        <div class="tab-pane @if($key == 0) active @endif" id="{{ $g }}">
                            @foreach($settings as $s)
                                @if($g == $s->group)
                                    <div class="row settings-root-group">
                                        <span class="col-3 settings-label-key"><strong>{{ $s->label }}:</strong></span>
                                        <div class="col-2 settings-system-name">{{ $s->key }}</div>
                                        <div class="col-5 settings-label-value">
                                            @if($s->type == 'checkbox')
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" name="{{ $s->key }}" value="1" class="custom-control-input input-value" id="customSwitch3" @if($s->value) checked @endif>
                                                        <label class="custom-control-label" for="customSwitch3">{{ trans('settings.checkbox') }}</label>
                                                    </div>
                                                </div>
                                            @elseif($s->type == 'textarea')
                                                <div class="form-group">
                                                    <div class="custom-control">
                                                        <textarea class="text-value" name="{{ $s->key }}">{{ $s->value }}</textarea>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <input type="text" name="{{ $s->key }}" class="form-control input-value" value="{{ $s->value }}">
                                                </div>
                                            @endif

                                        </div>
                                        <div class="col-1">
                                            <a href="{{ route('settings.edit', ['id' => $s->id]) }}" class="btn btn-block btn-outline-info settings-update"><i class="fa fa-edit"></i> </a>
                                        </div>

                                        <div class="col-1">
                                            <a href="{{ route('settings.delete', ['id' => $s->id]) }}"
                                               class="btn btn-block btn-outline-danger settings-delete remove-item-js">
                                                <i class="fa fa-times"></i>

                                            </a>
                                        </div>

                                    </div>
                                    <hr>
                                @endif
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->

            </div>
        </div>
    </div>

    <div class="modal fade show" id="modal-default" style="display: none; padding-right: 15px;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('settings.add_button') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('settings.store') }}" method="post">
                <div class="modal-body">
                        @csrf
                    @if(\App\Settings::checkTranslate())
                    <div class="form-group">
                        <label>Language</label>
                        <select name="group" class="form-control">
                            @foreach(config('app.locales') as $lang)
                                <option value="{{ $lang }}">{{ $lang }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Group</label>
                        <select name="group" class="form-control">
                            @foreach($groups as $group)
                                <option value="{{ $group }}">{{ $group }}</option>
                            @endforeach
                        </select>
                    </div>
                        <label>Label</label>
                        <input type="text" name="label" class="form-control" >
                        <label>Name</label>
                        <input type="text" name="key" class="form-control" >
                        <label>Value</label>
                        <input type="text" name="value" class="form-control" >
                    <div class="form-group">
                    <label>Type field</label>
                        <select name="type" class="form-control">
                            @foreach($types as $t)
                                <option value="{{ $t }}">{{ $t }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection

