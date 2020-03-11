@extends('layouts.user')
@section('title')
    {{ Auth::user()->name }} - Zmiana hasła
@endsection
@section('content')
    <h3 class="admin-page-title">Zmiana hasła</h3>
    @if ($errors->any())
        <div class="alert alert-danger w-100">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('change.password.user') }}">
        @csrf
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="old_pass">Stare hasło</label>
                <input id="old_pass" type="password" value="{{ old('old_pass') }}"
                       class="form-control form-control-sm" name="old_password" placeholder="Stare hasło"/>
            </div>
            <div class="col-lg-6">
                <label for="new_pass">Nowe hasło</label>
                <input id="new_pass" type="password" value="{{ old('new_pass') }}"
                       class="form-control form-control-sm" name="new_password" placeholder="Nowe hasło"/>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-outline-secondary btn-sm" type="submit">Zapisz</button>
        </div>
    </form>
@endsection
