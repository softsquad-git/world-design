@extends('layouts.app')
@section('meta')
    <title>{{ config('app.meta.success_product.title') }}</title>
@endsection
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('assets/front/images/bg_6.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">@lang('basket.hello'), {{ $item->name . ' ' . $item->last_name }}</h1>
                    <p class="breadcrumbs"><span>@lang('basket.success')</span></p>
                </div>
            </div>
        </div>
    </div>
    @if($item->shipment != 'inpost_download' && $item->shipment != 'dpd_download')
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-right">
                    <button data-toggle="modal" data-target="#dataPay" class="btn btn-standard-pay">Zwykły przelew</button>
                </div>
                <div class="col-lg-6 text-left">
                    <a href="{{ route('payment', ['id' => $item->id]) }}" class="btn-payu">Zapłać z PayU</a>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="dataPay" tabindex="-1" role="dialog" aria-labelledby="dataPayLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dataPayLabel">Dane do przelewu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Możesz wykonać tradycyjny przelew. Należy podać dane wyświetlone poniżej. Jeśli chcesz aby
                        zamówione prdukty dotarły do Ciebie wcześniej wykonaj szybszy przelew korzystając z płatności przy
                        pomocy PayU.</p>
                        <p class="pay-data">
                            <span>Dane odbiorcy: <span>{{ config('app.payment.payee') }}</span></span>
                            <span>Numer rachunku: <span>{{ config('app.payment.account_number_recipient') }}</span></span>
                            <span>Tytuł przelewu: <span>order-number-{{ $item->id }}</span></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p class="text-center">
            Wybrałeś sposób zapłaty przy odbiorze
        </p>
    @endif
@endsection
