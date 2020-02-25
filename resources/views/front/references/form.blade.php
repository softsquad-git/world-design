@extends('layouts.app')
@section('meta')
    <title>Dodaj opinię o naszym sklepie</title>
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h1 class="big">Referencje</h1>
                <h2 class="mb-4">Dodaj opinię</h2>
            </div>
        </div>
        <form method="post" action="{{ route('store.references', ['token' => $token]) }}">
            @csrf
            <div class="form-group">
                <label for="name"></label>
                <input id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Wyświetlana nazwa">
            </div>
            <div class="form-group">
                <label for="reference"></label>
                <textarea id="reference" class="form-control" name="reference" placeholder="Twoja opinia" rows="4">{{ old('reference') }}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-outline-secondary">Zapisz</button>
            </div>
            <p class="text-center">Opinię możesz dodać tylko raz po każdym zakupie produktu i nie możesz jej zmieniać. Zapisywane i wyświetlane są tylko dane które podajesz w
            formularzu powyżej.</p>
        </form>
    </div>
@endsection
