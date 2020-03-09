@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Zablokowani użytkownicy
@endsection
@section('content')
    @if($items->count() > 0)
        <h3 class="admin-page-title">Lista użytkowników ({{ $items->count() }})</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">E-mail</th>
                <th scope="col">Czy aktywowano?</th>
                <th scope="col">Data rejestracji</th>
                <th scope="col">Kupione</th>
                <th scope="col">Wiadomości</th>
                <th scope="col">Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>@if($item->activated == 1) Tak @else Nie @endif</td>
                    <td>{{ $item->created_at }}</td>
                    <td>1</td>
                    <td>{{ $item->messages->count() }}</td>
                    <td>
                        <a href="{{ action('Admin\Users\UserController@edit', ['id' => $item->id]) }}"
                           title="Edytuj" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                        <a href="{{ action('Admin\Users\UserController@item', ['id' => $item->id]) }}"
                           title="Zobacz podgląd" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> </a>
                        <a href="{{ action('Admin\Users\UserController@lock', ['id' => $item->id]) }}"
                           title="@if($item->status == Status::USER_STATUS_LOCK) Odblokuj @else Zablokuj @endif"
                           class="btn btn-sm btn-danger">
                            @if($item->status == Status::USER_STATUS_LOCK)
                                <i class="fa fa-unlock"></i>
                            @else
                                <i class="fa fa-lock"></i>
                            @endif
                        </a>
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
