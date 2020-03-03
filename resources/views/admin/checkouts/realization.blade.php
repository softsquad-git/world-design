@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Lista zamówień
@endsection
@section('content')
    @if($items->count() > 0)
        <h3 class="admin-page-title">Lista zamówień ({{ $items->count() }})</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imię i nazwisko</th>
                <th scope="col">Adres</th>
                <th scope="col">Cena<br/>Ilość</th>
                <th scope="col">Wysyłka</th>
                <th scope="col">Status</th>
                <th scope="col">Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr id="checkout-{{ $item->id }}">
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name . ' ' . $item->last_name }}</td>
                    <td>ul. {{ $item->street }}, {{ $item->number_home }} @if(!empty($item->local_number))
                            /{{ $item->local_number }} @endif
                        <br/>
                        {{ $item->post_code }}, {{ $item->city }}
                    </td>
                    <td>${{ $item->total_price }}<br/>{{ $item->quantity }}</td>
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
                    <td id="status-{{ $item->id }}">
                        @switch($item->status)
                            @case(Status::CHECKOUT_STATUS_SUBMITTED)
                            Złożono
                            @break
                            @case(Status::CHECKOUT_STATUS_ACCEPTED)
                            Zaakceptowane / Opłacone
                            @break
                            @case(Status::CHECKOUT_STATUS_SENT)
                            Wysłano
                            @break
                            @case(Status::CHECKOUT_STATUS_REALIZATION)
                            Zrealizowano
                            @break
                        @endswitch
                    </td>
                    <td>
                        <select style="width: 80%;border-radius: 0;" id="checkoutStatus" name="status" class="btn btn-sm btn-warning">
                            <option value="{{ Status::CHECKOUT_STATUS_SUBMITTED }}"{{ (old('status') == Status::CHECKOUT_STATUS_SUBMITTED || $item->status == Status::CHECKOUT_STATUS_SUBMITTED) ? ' selected="selected"' : '' }}>Przyjęto do realizacji</option>
                            <option value="{{ Status::CHECKOUT_STATUS_ACCEPTED }}"{{ (old('status') == Status::CHECKOUT_STATUS_ACCEPTED || $item->status == Status::CHECKOUT_STATUS_ACCEPTED) ? ' selected="selected"' : '' }}>W trakcie realizacji</option>
                            <option value="{{ Status::CHECKOUT_STATUS_SENT }}"{{ (old('status') == Status::CHECKOUT_STATUS_SENT || $item->status == Status::CHECKOUT_STATUS_SENT) ? ' selected="selected"' : '' }}>Wysłano do klienta</option>
                            <option value="{{ Status::CHECKOUT_STATUS_REALIZATION }}"{{ (old('status') == Status::CHECKOUT_STATUS_REALIZATION || $item->status == Status::CHECKOUT_STATUS_REALIZATION) ? ' selected="selected"' : '' }}>Zrealizowano</option>
                        </select>
                        <a style="width: 20%;border-radius: 0;margin-left: -5px;padding: 6px;" href="{{ action('Admin\Pages\PageController@delete', ['id' => $item->id]) }}"
                           title="Usuń" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i></a>
                        <div class="dropdown" >
                            <button style="width: 100%!important;border-radius: 0!important;" class="btn btn-sm btn-primary dropdown-toggle" type="button" id="show" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-eye"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="show">
                                <a class="dropdown-item" href="{{ action('Admin\CheckOuts\CheckOutController@show', ['id' => $item->id]) }}"
                                   title="Zobacz podgląd">Zobacz podgląd</a>
                                <a class="dropdown-item" href="{{ action('Admin\CheckOuts\CheckOutController@pdf', ['id' => $item->id]) }}">Pobierz PDF</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <script>
                    var statusSubmitted = '{{ Status::CHECKOUT_STATUS_SUBMITTED }}';
                    var statusAccepted = '{{ Status::CHECKOUT_STATUS_ACCEPTED }}';
                    var statusSent = '{{ Status::CHECKOUT_STATUS_SENT }}';
                    var statusRealization = '{{ Status::CHECKOUT_STATUS_REALIZATION }}';

                    $('#checkoutStatus').on('change', function () {
                        if (this.value == statusSubmitted) {
                            var status = statusSubmitted;
                        } else if (this.value == statusAccepted) {
                            var status = statusAccepted;
                        } else if (this.value == statusSent) {
                            var status = statusSent;
                        } else if (this.value == statusRealization) {
                            var status = statusRealization;
                        }

                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin.checkout.status', ['id' => $item->id]) }}',
                            data: {
                                _token: '{{ csrf_token() }}',
                                status: status
                            },
                            success: function (data) {
                                var checkOutStatus = document.getElementById('status-{{ $item->id }}');
                                if (data.item.status == statusSubmitted) {
                                    checkOutStatus.innerHTML = 'Złożono';
                                } else if (data.item.status == statusAccepted) {
                                    checkOutStatus.innerHTML = 'Zaakceptowane / Opłacone';
                                } else if (data.item.status == statusSent) {
                                    checkOutStatus.innerHTML = 'Wysłano'
                                } else if (data.item.status == statusRealization) {
                                    document.getElementById('checkout-{{ $item->id }}').remove();
                                }
                            },
                            error: function (data) {
                                alert('false')
                            }
                        })
                    });
                </script>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert-danger alert text-center w-100">
            Brak danych do wyświetlenia
        </div>
    @endif

@endsection

<script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
