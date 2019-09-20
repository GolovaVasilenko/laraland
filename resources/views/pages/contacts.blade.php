@extends('layouts.app')

@section('content')
    <section class="about pt-120 pb-100">
        <div class="container">
            @if(!empty($page))
                <div class="row">
                    <h1>{{$page->title}}</h1>
                </div>
                <div class="row">
                    <div class="content-body">
                        {!! $page->body !!}
                    </div>
                </div>
            @else
                {{ "Db Empty!" }}
            @endif
        </div>
    </section>
@endsection