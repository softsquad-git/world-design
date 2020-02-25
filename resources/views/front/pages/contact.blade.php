@extends('layouts.app')
@section('meta')

@endsection
@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('assets/front/images/bg_6.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Contact Us</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Contact</span></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="#" method="post" class="bg-white p-5 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Imię">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Temat">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Wiadomość"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Wyślij" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                <div class="col-md-6 d-flex">
                    <div id="map" class="bg-white"></div>
                </div>
            </div>
            <div class="row d-flex mt-5 contact-info">
                <div class="w-100"></div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Address: </span>{{ Setting::getLocation() }}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Telefon:</span> <a href="tel://1234567920">{{ Setting::getPhone() }}</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">{{ Setting::getEmail() }}</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Website</span> <a href="{{ route('home') }}">World Design</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
