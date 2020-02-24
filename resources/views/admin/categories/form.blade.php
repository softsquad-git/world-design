@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Dodaj kategorię
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger w-100">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post"
          action="{{ $item->id ? action('Admin\Categories\CategoryController@update', ['id' => $item->id]) : action('Admin\Categories\CategoryController@store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nazwa kategorii</label>
            <input type="text" name="name" class="form-control form-control-sm" placeholder="Wpisz nazwę kategorii"
                   value="{{ old('name') ? old('name') : $item->name }}" id="name">
        </div>
        <button type="submit" class="btn btn-outline-dark btn-sm">Zapisz</button>
    </form>
@endsection
