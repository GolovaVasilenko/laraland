@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$page->title}}</h1>
        </div>
        <div class="row">
            <div class="content-body">
                @widget('Languages')
                {{$page->body}}
            </div>
        </div>
    </div>
@endsection


