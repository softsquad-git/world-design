@extends('layouts.app')
@section('meta')

@endsection
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('assets/front/images/bg_6.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Koszyk</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Strona główna</a></span>
                        <span>Koszyk</span></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    @if($products->count() > 0)
                        <div class="cart-list">
                            <table class="table">
                                <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Produkt</th>
                                    <th>Cena</th>
                                    <th>Ilość</th>
                                    <th>Razem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr class="text-center">
                                        <td class="product-remove"><a
                                                href="{{ route('remove-basket', ['id' => $product->id]) }}"><span
                                                    class="ion-ios-close"></span></a></td>

                                        <td class="image-prod">
                                            <div class="img"
                                                 style="background-image:url({{ $product->product->getImage() }});"></div>
                                        </td>

                                        <td class="product-name">
                                            <h3><a href="{{ route('product', ['id' => $product->product_id]) }}">{{ $product->product->title }}</a></h3>
                                            {!! substr($product->product->description, 0, 100)  !!}
                                        </td>

                                        <td class="price">${{ $product->product->price }}</td>

                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <input type="number" name="quantity"
                                                       class="quantity form-control input-number"
                                                       value="{{ $product->quantity }}" min="1"
                                                       max="{{ $product->product->quantity }}">
                                            </div>
                                        </td>

                                        <td class="total">${{ $product->quantity * $product->product->price }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>${{ $products->total_price }}</span>
                        </p>
                    </div>
                    <p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to
                            Checkout</a></p>
                </div>
            </div>
            @include('front.basket.checkout')
                    @else
                        <div class="alert alert-danger w-100 text-center">
                            Brak produktów w koszyku <a href="{{ route('shops') }}">przejdź do sklepu</a>
                        </div>
                    @endif
        </div>
    </section>
@endsection
