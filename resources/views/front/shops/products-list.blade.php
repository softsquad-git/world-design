@extends('layouts.app')
@section('meta')

@endsection
@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('assets/front/images/bg_6.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">@lang('shop.title_list')</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">@lang('navbar.home')</a></span> <span>@lang('shop.title_list')</span></p>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section bg-light">
        <div class="container-fluid">
            <form method="get" action="{{ route('shops') }}" class="mb-5">
                <div class="row">
                    <div class="col-lg-3">
                        <input type="text" name="title" class="form-control" placeholder="@lang('shop.search_placeholder')">
                    </div>
                    <div class="col-lg-1">
                        <button class="btn w-100 btn-outline-secondary" type="submit" style="border-radius: 0;padding: 13px;"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-sm col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{ route('product', ['id' => $product->id]) }}" class="img-prod"><img class="img-fluid" src="{{ $product->getImage() }}" alt="{{ $product->title }}">
                                @if($product->status == Status::PRODUCT_STATUS_PROMO)
                                    <span class="status">@lang('shop.promotion')</span>
                                @elseif($product->status == Status::PRODUCT_STATUS_NEWS)
                                    <span class="status">@lang('shop.news')</span>
                                @endif
                            </a>
                            <div class="text py-3 px-3">
                                <h3><a href="{{ route('product', ['id' => $product->id]) }}">{{ $product->title }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        @if($product->status == Status::PRODUCT_STATUS_PROMO)
                                            <p class="price"><span class="mr-2 price-dc">${{ $product->old_price }}</span><span class="price-sale">${{ $product->price }}</span></p>
                                        @else
                                            <p class="price"><span class="price-sale">${{ $product->price }}</span></p>
                                        @endif
                                    </div>
                                    <div class="rating">
                                        <p class="text-right">
                                            <span class="fa fa-eye"> {{ $product->views }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5">
                {{ $products->render() }}
            </div>
        </div>
    </section>
@endsection
