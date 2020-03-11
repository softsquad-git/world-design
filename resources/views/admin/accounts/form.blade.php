@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Profil
@endsection
@section('content')
    <form method="post" action="{{ action('Admin\Accounts\AccountController@update') }}">
        @csrf
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="name">Imię i Nazwisko</label>
                <input id="name" class="form-control" type="text" name="name"
                       value="{{ old('name') ?? $item->name }}">
            </div>
            <div class="col-lg-6">
                <label for="email">E-mail</label>
                <input id="email" class="form-control" type="email" name="email"
                       value="{{ old('email') ?? $item->email }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-3">
                <label for="post-code">Kod pocztowy</label>
                <input id="post-code" class="form-control" type="text" name="post_code"
                       value="{{ old('post_code') ?? $item->contact->post_code }}">
            </div>
            <div class="col-lg-4">
                <label for="city">Miasto</label>
                <input id="city" class="form-control" type="text" name="city"
                       value="{{ old('city') ?? $item->contact->city }}">
            </div>
            <div class="col-lg-5">
                <label for="address">Adres</label>
                <input id="address" class="form-control" type="text" name="address"
                       value="{{ old('address') ?? $item->contact->address }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-5">
                <label for="country">Kraj</label>
                <input id="country" class="form-control" type="text" name="country"
                       value="{{ old('country') ?? $item->contact->country }}">
            </div>
            <div class="col-lg-5">
                <label for="phone">Telefon</label>
                <input id="phone" class="form-control" type="text" name="phone"
                       value="{{ old('phone') ?? $item->contact->phone }}">
            </div>
            <div class="col-lg-2">
                <label></label>
                <button class="btn btn-outline-secondary mt-lg-2 w-100" type="submit">Zapisz</button>
            </div>
        </div>
    </form>

    <a href="{{ action('Admin\Accounts\AccountController@changePass') }}" class="mt-5">Zmień hasło</a>
@endsection
