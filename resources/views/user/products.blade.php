@extends('layouts.user')
@section('title')
    {{ config('app.author.name') }}
    - Kupione produkty
@endsection
@section('content')
    @if($items->count() > 0)
        <h3 class="admin-page-title">Lista produktów ({{ $items->count() }})</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Produkty</th>
                <th scope="col">Cena</th>
                <th scope="col">Status</th>
                <th scope="col">Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <th>

                    </th>
                    <td>${{ $item->total_price }}</td>
                    <td>
                        @switch($item->status)
                            @case(Status::CHECKOUT_STATUS_SUBMITTED)
                            Przyjęto do realizacji
                            @break
                            @case(Status::CHECKOUT_STATUS_ACCEPTED)
                            W trakcie realizacji
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
