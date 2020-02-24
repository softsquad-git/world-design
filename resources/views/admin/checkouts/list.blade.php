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
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name . ' ' . $item->last_name }}</td>
                    <td>ul. {{ $item->street }}, {{ $item->number_home }} @if(!empty($item->local_number))/{{ $item->local_number }} @endif
                    <br/>
                        {{ $item->post_code }}, {{ $item->city }}
                    </td>
                    <td>${{ $item->total_price }}<br/>{{ $item->quantity }}</td>
                    <td>{{ $item->shipment }}</td>
                    <td>
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
                        <a href="{{ action('Admin\Pages\PageController@edit', ['id' => $item->id]) }}"
                           title="Edytuj" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                        <a href="{{ action('Admin\Pages\PageController@delete', ['id' => $item->id]) }}"
                           title="Usuń" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i></a>
                        <a href="{{ action('Admin\Pages\PageController@item', ['id' => $item->id]) }}"
                           title="Zobacz podgląd" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert-danger alert text-center w-100">
            Brak danych do wyświetlenia
        </div>
    @endif

@endsection
