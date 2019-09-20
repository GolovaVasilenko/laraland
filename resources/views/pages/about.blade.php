@extends('layouts.app')

@section('content')
    @php $count = 0; @endphp
    <section id="about-page" class="about pt-180 pb-100">
    <div class="container">
        @if(!empty($page))
        <div class="row">
            <h1>{{$page->title}}</h1>
        </div>
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



