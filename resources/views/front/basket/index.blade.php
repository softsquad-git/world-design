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
                                    <tr class="text-center" id="product_id_{{ $product->id }}">
                                        <td id="remove-{{ $product->id }}" class="product-remove"><span
                                                    class="ion-ios-close"></span></td>
                                        <script>
                                                $('#remove-{{ $product->id }}').click(function () {
                                                    $.ajax({
                                                        type: 'GET',
                                                        url: '{{ route('remove-basket', ['id' => $product->id]) }}',
                                                        success: function (data) {
                                                            document.getElementById('all_total_price').innerHTML = data.total_price;
                                                            $('#product_id_{{ $product->id }}').remove()
                                                        },
                                                        error: function () {
                                                            alert('Error')
                                                        }
                                                    })
                                                });
                                        </script>
                                        <td class="image-prod">
                                            <div class="img"
                                                 style="background-image:url({{ $product->product->getImage() }});"></div>
                                        </td>

                                        <td class="product-name">
                                            <h3>
                                                <a href="{{ route('product', ['id' => $product->product_id]) }}">{{ $product->product->title }}</a>
                                            </h3>
                                            {!! substr($product->product->description, 0, 100)  !!}
                                        </td>

                                        <td class="price">${{ $product->product->price }}</td>

                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <input id="quantity_{{ $product->id }}" type="number" name="quantity"
                                                       class="quantity form-control input-number"
                                                       value="{{ $product->quantity }}" min="1"
                                                       max="{{ $product->product->quantity }}">
                                            </div>
                                        </td>

                                        <td class="total">$<span id="totalPrice">{{ $product->quantity * $product->product->price }}</span></td>
                                        <script>
                                            $('#quantity_{{ $product->id }}').change(function () {
                                                var quantity = $('#quantity_{{ $product->id }}').val();
                                                var price = {{ $product->product->price }}

                                                $.ajax({
                                                    type: 'POST',
                                                    url: '{{ route('basket.change-quantity', ['basket_id' => $product->id]) }}',
                                                    data: {
                                                        _token: '{{ csrf_token() }}',
                                                        quantity: quantity
                                                    },
                                                    success: function (data) {
                                                        document.getElementById('all_total_price').innerHTML = data.total_price;
                                                    },
                                                    error: function (data) {
                                                        document.location.reload();
                                                    }
                                                })
                                                var total_price = totalPrice(quantity, price);
                                                document.getElementById('totalPrice').innerHTML = total_price;
                                                function totalPrice(quantity, price) {
                                                    return quantity * price;
                                                }
                                            });
                                        </script>
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
                        <h3>Zamówienie</h3>
                        <p class="d-flex total-price">
                            <span>Razem</span>
                            $ <span id="all_total_price">{{ $products->total_price }}</span>
                        </p>
                    </div>
                    <p id="ch-btn" class="text-center"><span class="btn btn-primary py-3 px-4">Złóż zamówienie</span></p>
                    <p id="ch-v-btn" class="text-center"><span class="btn btn-primary py-3 px-4">Anuluj</span></p>
                </div>
            </div>
            <span id="checkout-view">@include('front.basket.checkout')</span>
            @else
                <div class="alert alert-danger w-100 text-center">
                    Brak produktów w koszyku <a href="{{ route('shops') }}">przejdź do sklepu</a>
                </div>
            @endif
        </div>
    </section>
@endsection
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#checkout-view').hide();
        $('#ch-v-btn').hide();
        $('#ch-btn').click(function () {
            $('#checkout-view').show();
            $('#ch-btn').hide();
            $('#ch-v-btn').show();
        });
        $('#ch-v-btn').click(function () {
            $('#checkout-view').hide();
            $('#ch-v-btn').hide();
            $('#ch-btn').show();
        });
    });
</script>

