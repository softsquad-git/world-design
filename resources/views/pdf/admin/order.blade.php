@extends('layouts.pdf')
@section('css')

    <style>

    </style>
@endsection
@section('content')
    <table class="table">
        <tbody>
        <tr style="width: 100%!important;">
            <td style="width: 50%!important;" class="ttt">Imię i Nazwisko</td>
            <td style="width: 50%!important;" >{{ $item->name }}</td>
        </tr>
        <tr>
            <td class="ttt">E-mail</td>
            <td>{{ $item->email }}</td>
        </tr>
        <tr>
            <td class="ttt">Adres</td>
            <td>{{ $item->address }}</td>
        </tr>
        <tr>
            <td class="ttt">Miasto i kod <br/> pocztowy</td>
            <td>{{ $item->post_code }}, {{ $item->city }}</td>
        </tr>
        <tr>
            <td class="ttt">Kraj</td>
            <td>{{ $item->country }}</td>
        </tr>
        <tr>
            <td class="ttt">Cena</td>
            <td>{{ $item->total_price }}</td>
        </tr>
        <tr>
            <td class="ttt">Wysyłka</td>
            <td>
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
            </td>
        </tr>
        <tr>
            <td class="ttt">Rozmiar</td>
            <td>{{ $item->size }}</td>
        </tr>
        <tr>
            <td class="ttt">Ilość</td>
            <td>{{ $item->quantity }}</td>
        </tr>
        <tr>
            <td class="ttt">Data zamówienia</td>
            <td>{{ $item->created_at }}</td>
        </tr>
        </tbody>
    </table>
    <div class="card-title">Zamówione produkty</div>
    @foreach($item->products as $product)
        <a href="{{ action('Admin\Products\ProductController@item', ['id' => $product->id]) }}"
           target="_blank" class="checkout-product">{{ $product->title }}</a>
    @endforeach
@endsection
