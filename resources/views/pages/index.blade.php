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
    <div id="about-us" class="discount-area pt-100 pb-100">
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
    @foreach($page->sections as $section)
    <section id="{{ $section->idName }}"
        <div class="collection-block {{ $section->className }} pt-100 pb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="deal-img-2 wow fadeInLeft list-url-img" style="visibility: visible; animation-name: fadeInLeft;"
                            data-count="{{ $section->media->count() }}"
                        >
                            @foreach($section->media as $img)
                                <input type="hidden" class="gallery-collection-items" data-id="{{ $img->id }}" data-url="{{ $img->getUrl() }}"/>
                            @endforeach
                            <img src="{{ $section->getFirstMediaUrl('media') }}" alt="overview">
                            <div class="deal-btn btn-hover btn-hover-radious">
                                <a id="show-collection-w" class="black-color" href="#">Смотреть <i class="la la-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="deal-content-3">
                            <h2><span class="brand-simple-text">{{$section->translate->data['title']}}</h2>
                            <div class="collection-description">
                                {{$section->translate->data['description']}}
                                <div class="discount-btn default-btn btn-hover">
                                    <a class="btn-color-theme btn-size-md btn-style-outline" href="/">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
@endsection


