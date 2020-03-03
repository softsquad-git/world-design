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
                <th scope="col">Kwota</th>
                <th scope="col">Status</th>
                <th scope="col">Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
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
                        <button id="show-order-{{ $item->id }}" class="btn btn-sm btn-outline-warning">Zobacz szczegoły</button>
                    </td>
                </tr>
                <script>
                    $('#show-order-{{ $item->id }}').click(function () {
                        $.ajax({
                            type: 'GET',
                            url: '{{ route('user.order', ['id' => $item->id]) }}',
                            success: function (data) {
                                $('#show-order-{{ $item->id }}').modal('show');
                                document.getElementById('modal__created_at').innerHTML = data.item.created_at;
                                document.getElementById('modal__total_price').innerHTML = data.item.total_price;
                                var products = data.products;
                                products.forEach(function (product) {
                                    $('#products').append('<li>'+product.title+'</li>');
                                })
                            }
                        })
                    })
                </script>
                <div class="modal fade" id="show-order-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Szczegóły zamówienia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body order-details">
                                <p>
                                    Zamówienie zostało złożone: <span id="modal__created_at"></span>. <br/>
                                    Łączna kwota zamówienia: $ <span id="modal__total_price"></span>. <br/>
                                </p>
                                Zakupione produkty:
                                <ul id="products">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
