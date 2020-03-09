@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Lista kolorów
@endsection
@section('content')
    @if($items->count() > 0)
        <h3 class="admin-page-title">Lista kolorów ({{ $items->count() }})</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kod</th>
                <th scope="col">Próbka</th>
                <th scope="col">Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->code }}</td>
                    <td>
                        <div class="color-test" style="background: {{ $item->code }}"></div>
                    </td>
                    <td>
                        <a href="{{ action('Admin\Colors\ColorController@edit', ['id' => $item->id]) }}"
                           title="Edytuj" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                        <a href="{{ action('Admin\Colors\ColorController@delete', ['id' => $item->id]) }}"
                           title="Usuń" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i></a>
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
