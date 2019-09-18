@extends('layouts.app')

@section('content')
    <section class="about pt-140 pb-100">
    <div class="container">
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
                 <p>Loren ipsun hfgsbbc urytcnn bolder goildj hgjtuhd
                     Loren ipsun hfgsbbc urytcnn bolder goildj hgjtuhd
                     Loren ipsun hfgsbbc urytcnn bolder goildj hgjtuhd
                     Loren ipsun hfgsbbc urytcnn bolder goildj hgjtuhd</p>
            </div>
        </div>
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



