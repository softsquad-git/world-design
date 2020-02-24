@extends('layouts.app')
@section('meta')

@endsection
@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('assets/front/images/bg_6.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Produkty</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Strona główna</a></span> <span>Produkty</span></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container-fluid">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-sm col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{ route('product', ['id' => $product->id]) }}" class="img-prod"><img class="img-fluid" src="{{ $product->getImage() }}" alt="{{ $product->title }}">
                                @if($product->status == Status::PRODUCT_STATUS_PROMO)
                                    <span class="status">PROMOCJA</span>
                                @elseif($product->status == Status::PRODUCT_STATUS_NEWS)
                                    <span class="status">NOWOŚĆ</span>
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
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        {{ $products->render() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
