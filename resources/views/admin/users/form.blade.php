@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - {{ $item->name }}
@endsection
@section('content')
    <form method="post" action="{{ action('Admin\Users\UserController@update', ['id' => $item->id]) }}">
        @csrf
        <div class="form-group row">
            <div class="col-lg-4">
                <label for="name">Nazwa</label>
                <input id="name" type="text" placeholder="Wpisz imię i nazwisko" class="form-control form-control-sm"
                       name="name" value="{{ old('name') ?? $item->name }}">
            </div>
            <div class="col-lg-4">
                <label for="email">E-mail</label>
                <input id="email" type="email" placeholder="Wpisz E-mail" class="form-control-sm form-control"
                       name="email" value="{{ old('email') ?? $item->email }}">
            </div>
            <div class="col-lg-4">
                <label for="phone">Telefon</label>
                <input id="phone" type="text" placeholder="Telefon" class="form-control form-control-sm"
                       name="phone" value="{{ old('phone') ?? $item->contact->phone }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-3">
                <label for="post_code">Kod Pocztowy</label>
                <input id="post_code" type="text" placeholder="Kod pocztowy" class="form-control form-control-sm"
                       name="post_code" value="{{ old('post_code') ?? $item->contact->post_code }}">
            </div>
            <div class="col-lg-3">
                <label for="city">Miasto</label>
                <input id="city" type="text" placeholder="Miasto" class="form-control-sm form-control"
                       name="city" value="{{ old('city') ?? $item->contact->city }}">
            </div>
            <div class="col-lg-3">
                <label for="address">Adres</label>
                <input id="address" type="text" placeholder="Adres" class="form-control form-control-sm"
                       name="address" value="{{ old('address') ?? $item->contact->address }}">
            </div>
            <div class="col-lg-3">
                <label for="country">Kraj</label>
                <input id="country" type="text" placeholder="Kraj" class="form-control-sm form-control"
                       name="country" value="{{ old('country') ?? $item->contact->country }}">
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-outline-secondary btn-sm" type="submit">Zapisz</button>
        </div>
    </form>
@endsection
