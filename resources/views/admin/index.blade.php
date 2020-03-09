@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Panel Administratora
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="stat-admin">
                <span class="text">Dostępne produkty</span><span class="float-right">{{ $c_product }}</span>
            </div>
            <div class="stat-admin">
                <span class="text">Złożone zamówienia</span><span class="float-right">{{ $c_checkout }}</span>
            </div>
            <div class="stat-admin">
                <span class="text">Opinie do zaakceptowania</span><span class="float-right">{{ $c_ref_wait }}</span>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="stat-admin">
                <span class="text">Zarejestrowani użytkownicy</span><span class="float-right">{{ $c_user }}</span>
            </div>
            <div class="stat-admin">
                <span class="text">Opublikowane opinie</span><span class="float-right">{{ $c_ref_accept }}</span>
            </div>
            <div class="stat-admin">
                <span class="text">Użytkownicy newsletter</span><span class="float-right">{{ $c_newsletter }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
