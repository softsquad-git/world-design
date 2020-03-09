@extends('layouts.app')
@section('meta')

@endsection
@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('assets/front/images/bg_6.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">@lang('contact.title')</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">@lang('navbar.home')</a></span> <span>@lang('contact.title')</span></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="{{ route('contact.form') }}" method="post" class="bg-white p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="@lang('contact.name')">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="@lang('contact.email')">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="@lang('contact.subject')">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="@lang('contact.message')"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="@lang('contact.submit')" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>
            </div>
            <div class="row d-flex mt-5 contact-info">
                <div class="w-100"></div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>@lang('contact.address'): </span>{!! Setting::getLocation() !!}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>@lang('contact.phone'): </span> <a href="tel://1234567920">{!! Setting::getPhone() !!}</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>@lang('contact.email'): </span> <a href="mailto:info@yoursite.com">{!! Setting::getEmail() !!}</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>@lang('contact.website'): </span> <a href="{{ route('home') }}">{{ config('app.name') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
