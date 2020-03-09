@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Lista subskrybentów
@endsection
@section('content')
    @if($items->count() > 0)
        <h3 class="admin-page-title">Lista subskrybentów ({{ $items->count() }})</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->email }}</td>
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
