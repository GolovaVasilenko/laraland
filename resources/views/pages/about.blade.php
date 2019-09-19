@extends('layouts.app')

@section('content')
    <section class="about pt-180 pb-100">
    <div class="container">
        <div class="row">
            <h1>{{$page->title}}</h1>

        </div>

        <div class="row">
            <div class="gallery-wrapper popup-gallery">
                <div class="first-item gallery-thumb-box">
                    <a href="assets/images/photo_2019-09-13_12-18-47.jpg"><img src="assets/images/photo_2019-09-13_12-18-47.jpg" alt="" /></a>
                </div>
                <div class="item-2 gallery-thumb-box">
                    <a href="assets/images/photo_2019-09-13_15-19-50.jpg"><img src="assets/images/photo_2019-09-13_15-19-50.jpg" alt="" /></a>
                </div>
                <div class="item-3 gallery-thumb-box">
                    <a href="assets/images/photo_2019-09-13_15-43-13.jpg"><img src="assets/images/photo_2019-09-13_15-43-13.jpg" alt="" /></a>
                </div>
                <div class="text-item gallery-thumb-box">
                     <p>Более 25 лет мы непрерывно развиваем и модернизируем наше
                         производство, улучшая его технологическое и программное оснащение.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="gallery-wrapper invert popup-gallery">
                <div class="first-item gallery-thumb-box">
                    <a href="assets/images/photo_2019-09-13_15-43-48.jpg"><img src="assets/images/photo_2019-09-13_15-43-48.jpg" alt="" /></a>
                </div>
                <div class="item-2 gallery-thumb-box">
                    <a href="assets/images/photo_2019-09-13_15-44-01.jpg"><img src="assets/images/photo_2019-09-13_15-44-01.jpg" alt="" /></a>
                </div>
                <div class="item-3 gallery-thumb-box">
                    <a href="assets/images/photo_2019-09-13_15-44-12.jpg"><img src="assets/images/photo_2019-09-13_15-44-12.jpg" alt="" /></a>
                </div>
                <div class="text-item gallery-thumb-box">
                    <p>Более 25 лет мы непрерывно развиваем и модернизируем наше
                        производство, улучшая его технологическое и программное оснащение.</p>
                </div>
            </div>
        </div>
        @if(!empty($page))
            <div class="row">
                <div class="content-body">
                </div>
            </div>
        @else
            {{ "Db Empty!" }}
        @endif
    </div>
    </section>
@endsection



