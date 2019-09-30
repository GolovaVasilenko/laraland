@extends('layouts.app')

@section('content')
    <section class="about pt-120 pb-100">
        <div class="container">
            @if(!empty($page))
                <div class="contact-info-wrap mb-50">
                    <h3>{{$page->title}}</h3>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="single-contact-info text-center mb-30">
                                <i class="ti-location-pin"></i>
                                <h4>Наш Адрес</h4>
                                <p>{{ $address->value }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-contact-info extra-contact-info text-center mb-30">
                                <ul>
                                    <li><i class="ti-mobile"></i> <strong>{{ $sales->label }}</strong><br>{{ $sales->value }}</li>
                                    <li><i class="ti-mobile"></i><strong>{{ $other->label }}</strong><br>{{ $other->value }}</li>
                                    <li><i class="ti-email"></i> <a href="#"> info@example.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-contact-info text-center mb-30">
                                <i class=" ti-alarm-clock"></i>
                                <h4>{{ $schedule->label }}</h4>
                                <p>{{ $schedule->value }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="get-in-touch-wrap">
                    <h3>Оставить Сообщение</h3>
                    <div class="contact-from contact-shadow">
                        <form id="contact-form" action="assets/mail.php" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input name="name" type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input name="email" type="email" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" placeholder="Your Message"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <button class="submit" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
                <div class="contact-map pt-90">
                    {!! $map->value !!}
                </div>
            @else
                {{ "Db Empty!" }}
            @endif
        </div>
    </section>
@endsection
