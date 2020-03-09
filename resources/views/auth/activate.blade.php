@extends('layouts.app')
@section('meta')
    <title>Aktywuj konto</title>
@endsection
@section('content')
    <div class="hero-wrap hero-bread mb-5" style="background-image: url({{ asset('assets/front/images/bg_6.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Aktywuj konto</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Strona główna</a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Activate account') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('activate_account') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Kod') }}</label>

                                <div class="col-md-6">
                                    <input id="key" type="text" minlenght="15" maxlenght="15" class="form-control @error('key') is-invalid @enderror" name="key" value="{{ old('key') }}" required autocomplete="email" autofocus>

                                    @error('key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Activate') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
