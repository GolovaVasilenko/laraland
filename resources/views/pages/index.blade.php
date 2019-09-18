@extends('layouts.app')

@section('content')

    <div class="slider-area pb-100">
        <div class="first-screen">
            <div class="bg-left">
            </div>
            <div class="hero-logo">
                <h1 class="main-hero-h1"><span class="lg-text-h1">FERESKI</span>Производитель обуви в Украине</h1>
                <p>Гармония качества, цены и комфорта.</p>
                <a class="button-down" href="#about-us">
                    <i class="la la-angle-double-down"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="discount-area pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="discount-img">
                        <a href="#">
                            <img src="assets/images/about-us.jpg" alt="discount-img">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="discount-content">
                        <p>Обувное производство <span class="brand-simple-text">FERESKI</span> представляет вашему<br>
                            вниманию обувь высокого качества по демократичным ценам.</p>
                            <h2>О компании</h2>
                        <p class="bright-color">Более 25 лет мы непрерывно развиваем и модернизируем наше производство,
                            улучшая его технологическое и программное оснащение, отбирая наилучшие комплектующие, а также осуществляя поиск и обучение лучших специалистов, для того чтобы обеспечивать наших покупателей продуктом наивысшего качества.</p>
                        <div class="discount-btn default-btn btn-hover">
                            <a class="btn-color-theme btn-size-md btn-style-outline" href="/o-nas">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="container">
        @if(!empty($page))
        <div class="row">
            <h1>{{$page->title}}</h1>
        </div>
        <div class="row">
            <div class="content-body">
                {{$page->body}}
            </div>
        </div>
        @else
            {{ "Db Empty!" }}
        @endif
    </div>-->
@endsection


