@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$page->title}}</h1>
        </div>
        <div class="row">
            <div class="content-body">
                {{$page->body}}
                <products-component></products-component>
            </div>
        </div>
    </div>
@endsection


