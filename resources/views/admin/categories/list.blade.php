@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Lista kategorii
@endsection
@section('content')
    @if($items->count() > 0)
        <h3 class="admin-page-title">Lista kategorii ({{ $items->count() }})</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Liczba produktów</th>
                <th scope="col">Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->products->count() }}</td>
                    <td>
                        <a href="{{ action('Admin\Categories\CategoryController@edit', ['id' => $item->id]) }}"
                           title="Edytuj" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                        <a href="{{ action('Admin\Categories\CategoryController@delete', ['id' => $item->id]) }}"
                           title="Usuń" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i></a>
                        @if($item->products->count() > 0)
                            <a href="{{ action('Admin\Categories\CategoryController@item', ['id' => $item->id]) }}"
                               title="Wyświetl produkty z kategorii" class="btn btn-sm btn-primary" -><i
                                    class="fa fa-eye"></i></a>
                        @endif
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
