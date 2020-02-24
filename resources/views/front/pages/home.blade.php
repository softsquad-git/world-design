@extends('layouts.app')
@section('meta')

@endsection
@section('content')
    @include('front.pages.home.top-page')
    @include('front.pages.home.trending-product', ['data' => $trending])
    @include('front.pages.home.about-page')
    @include('front.pages.home.our-products', ['data' => $our_products])
    @include('front.pages.home.testimony', ['data' => $references])
    @include('front.pages.home.stat')
    @include('front.pages.home.newsletter')
@endsection
