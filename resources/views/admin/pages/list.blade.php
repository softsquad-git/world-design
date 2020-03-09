@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Strony
@endsection
@section('content')
    @if($items->count() > 0)
        <h3 class="admin-page-title">Lista stron ({{ $items->count() }})</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tytuł</th>
                <th scope="col">Alias</th>
                <th scope="col">Język</th>
                <th scope="col">Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->alias }}</td>
                    <td>
                        @switch($item->locale)
                            @case('pl')
                            <img src="{{ asset('assets/flags/pl.png') }}" style="width: 30px!important;" class="flag-language-admin">
                            @break
                            @case('en')
                            <img src="{{ asset('assets/flags/en.png') }}" style="width: 30px!important;" class="flag-language-admin">
                            @break
                            @case('ru')
                            <img src="{{ asset('assets/flags/ru.png') }}" style="width: 30px!important;" class="flag-language-admin">
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
        {{ $items->render() }}
    @else
        <div class="alert-danger alert text-center w-100">
            Brak danych do wyświetlenia
        </div>
    @endif

@endsection
