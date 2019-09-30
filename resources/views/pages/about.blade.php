@extends('layouts.app')

@section('content')
    @php $count = 0; @endphp
    <div class="breadcrumb-area bg-header-block">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1>{{$page->title}}</h1>
                <ul>
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li class="active">О компании</li>
                </ul>
            </div>
        </div>
    </div>
    <section id="about-page" class="about pt-100 pb-100">
    <div class="container">
        @if(!empty($page))

        @foreach($body as $b)
            @break(empty($images))
        <div class="row">
            <div class="gallery-wrapper @if($count%2 == 0) invert @endif popup-gallery">
                <div class="first-item gallery-thumb-box">
                    @php $img = array_shift($images); @endphp
                    <a href="assets/images/{{ $img }}"><img src="assets/images/{{ $img }}" alt="" /></a>
                </div>
                <div class="item-2 gallery-thumb-box">
                    @php $img = array_shift($images); @endphp
                    <a href="assets/images/{{ $img }}"><img src="assets/images/{{ $img }}" alt="" /></a>
                </div>
                <div class="item-3 gallery-thumb-box">
                    @php $img = array_shift($images); $count++; @endphp
                    <a href="assets/images/{{ $img }}"><img src="assets/images/{{ $img }}" alt="" /></a>
                </div>
                <div class="text-item gallery-thumb-box">
                     <p>{{ array_shift($body) }}.</p>
                </div>
            </div>
        </div>
        @endforeach
            @if(!empty($body))
                <div class="other-text text-item">
                @foreach($body as $b)
                    <p>{{ $b }}</p>
                @endforeach
                </div>
            @endif
        @else
            {{ "Db Empty!" }}
        @endif
    </div>
    </section>
@endsection



