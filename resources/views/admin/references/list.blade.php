@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Lista produktów
@endsection
@section('content')
    @if($items->count() > 0)
        <h3 class="admin-page-title">Lista referencji ({{ $items->count() }})</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Treść</th>
                <th scope="col">Status</th>
                <th scope="col">Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->reference }}</td>
                    <td>
                        @switch($item->status)
                            @case(Status::REFERENCE_STATUS_ACCEPT)
                                Zaakceptowana
                            @break
                            @case(Status::REFERENCE_STATUS_MODIFY)
                                Oczekująca
                            @break
                        @endswitch
                    </td>
                    <td>
                        @if($item->status != Status::REFERENCE_STATUS_ACCEPT)
                            <a href="{{ action('Admin\References\ReferenceController@accept', ['id' => $item->id]) }}"
                               title="Zaakceptuj" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                        @else
                            <span class="btn btn-sm btn-success" title="Zaakceptowano"><span class="fa fa-check"></span></span>
                        @endif
                            <a href="{{ action('Admin\References\ReferenceController@delete', ['id' => $item->id]) }}"
                               title="Usuń" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $items->render() }}
    @else
        <div class="alert-danger alert text-center w-100">
            Brak danych do wyświetlenia
        </div>
    @endif

@endsection
