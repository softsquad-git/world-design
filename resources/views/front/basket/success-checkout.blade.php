@extends('layouts.app')
@section('meta')
    <title>{{ config('app.meta.success_product.title') }}</title>
@endsection
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('assets/front/images/bg_6.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Hej, {{ $item->name . ' ' . $item->last_name }}</h1>
                    <p class="breadcrumbs"><span>Dziękujemy za zakupy w naszym sklepie</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
