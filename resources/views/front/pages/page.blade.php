@extends('layouts.app')
@section('meta')
    <title>{{ $page->meta_title ?? config('app.meta.title') }}</title>
    <meta name="keywords" content="{{ $page->meta_keywords ?? config('app.meta.keywords') }}">
    <meta name="description" content="{{ $page->meta_description ?? config('app.meta.description') }}">
@endsection
@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('assets/front/images/bg_6.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">{{ $page->title }}</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>{{ $page->title }}</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        {!! $page->content !!}
    </div>
@endsection
