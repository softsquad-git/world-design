@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Order {{ $item->id }}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        Zamówienie NR. {{ $item->id }}
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <tr><td class="ttt">Imię i Nazwisko</td><td>{{ $item->name }}</td></tr>
                            <tr><td class="ttt">E-mail</td><td>{{ $item->email }}</td></tr>
                            <tr><td class="ttt">Telefon</td><td>{{ $item->phone }}</td></tr>
                            <tr><td class="ttt">Adres</td><td>{{ $item->address }}</td></tr>
                            <tr><td class="ttt">Miasto i kod <br/> pocztowy</td><td>{{ $item->post_code }}, {{ $item->city }}</td></tr>
                            <tr><td class="ttt">Kraj</td><td>{{ $item->country }}</td></tr>
                            <tr><td class="ttt">Cena</td><td>{{ $item->total_price }}</td></tr>
                            <tr><td class="ttt">Wysyłka</td><td>
                                    @switch($item->shipment)
                                        @case('dpd_classic')
                                        DPD (przedpłata)
                                        @break
                                        @case('dpd_download')
                                        DPD (pobranie)
                                        @break
                                        @case('inpost_classic')
                                        InPost (przedpłata)
                                        @break
                                        @case('inpost_download')
                                        InPost (pobranie)
                                        @break
                                    @endswitch
                                </td></tr>
                            <tr><td class="ttt">Rozmiar</td><td>{{ $item->size }}</td></tr>
                            <tr><td class="ttt">Ilość</td><td>{{ $item->quantity }}</td></tr>
                            <tr><td class="ttt">Data zamówienia</td><td>{{ $item->created_at }}</td></tr>
                            </tbody>
                        </table>
                        <div class="card-title">Zamówione produkty</div>
                        @foreach($item->products as $product)
                            <a href="{{ action('Admin\Products\ProductController@item', ['id' => $product->id]) }}"
                               target="_blank" class="checkout-product">{{ $product->title }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
