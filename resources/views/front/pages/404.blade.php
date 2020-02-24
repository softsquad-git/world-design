@extends('layouts.app')
@section('meta')
    <title>Page Not Found</title>
@endsection
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('assets/front/images/bg_6.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Not Found (404)</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Strona główna</a></span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
