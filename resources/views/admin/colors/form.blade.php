@extends('layouts.admin')
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
          action="{{ $item->id ? action('Admin\Colors\ColorController@update', ['id' => $item->id]) : action('Admin\Colors\ColorController@store') }}">
        @csrf
        <div class="form-group">
            <label for="code">Kolor</label>
            <input type="color" name="code" class="form-control form-control-sm"
                   value="{{ old('code') ? old('code') : $item->code }}" id="code">
        </div>
        <button type="submit" class="btn btn-outline-dark btn-sm">Zapisz</button>
    </form>
@endsection
