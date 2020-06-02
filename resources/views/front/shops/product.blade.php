@extends('layouts.app')
@section('meta')
    <title>{{ $product->meta_title ?? $product->title }}</title>
    <meta name="keywords" content="{{ $product->meta_keywords ?? config('app.meta.keywords') }}">
    <meta name="description" content="{{ $product->meta_description ?? config('app.meta.description') }}">
@endsection
@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('assets/front/images/bg_6.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">{{ $product->title }}</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">@lang('navbar.home')</a></span> <span class="mr-2"><a href="{{ route('shops') }}">@lang('navbar.shop')</a></span> <span>{{ $product->title }}</span></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <span @if($product->images->count() > 0) data-toggle="modal" data-target="#galleryProduct"
                        @endif><img src="{{ $product->getImage() }}" class="img-fluid" alt="{{ $product->title }}"></span>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $product->title }}</h3>
                    <p class="price">
                        @if($product->status == Status::PRODUCT_STATUS_PROMO)
                            <span class="mr-2"><s>${{ $product->old_price }}</s></span> <span>${{ $product->price }}</span>
                        @else
                            <span>${{ $product->price }}</span>
                        @endif
                    </p>
                    {!! $product->description !!}
                    <div class="basket-product">
                        <form action="{{ route('add-basket') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                            <div class="form-group row">
                                <div class="col-lg-8">
                                    <label from="size">@lang('shop.size')</label>
                                    <select name="size" id="size" class="form-control">
                                        @foreach(json_decode($product->sizes) as $size)
                                            <option value="{{ $size }}">{{ $size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label from="quantity">@lang('shop.quantity')</label>
                                        <input id="quantity" type="number" name="quantity" class="form-control"
                                               min="1" max="{{ $product->quantity }}" placeholder="@lang('shop.quantity')">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <button class="btn btn-outline-secondary" type="submit">@lang('shop.add_basket')</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="content">
                        {!! $product->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($product->images->count() > 0)
        <div class="modal fade" id="galleryProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($product->images as $image)
                                    <div class="carousel-item @if($loop->first) active @endif">
                                        <img src="{{ $image->getImage() }}" class="d-block w-100" alt="{{ $product->title }}">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
