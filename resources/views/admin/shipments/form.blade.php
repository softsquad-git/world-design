@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Ustal ceny wysłyki
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
        <table class="table">
            <thead>
            <tr>
                <th scope="col">DPD (przedpłata)</th>
                <th scope="col">DPD (pobranie)</th>
                <th scope="col">InPost (przedpłata)</th>
                <th scope="col">InPost (pobranie)</th>
            </tr>
            </thead>
            <tbody>
               <form method="post" action="{{ action('Admin\Shipments\ShipmentPriceController@store') }}">
                   <tr>
                   @csrf
                   <td><input type="number" step="0.01" placeholder="Cena" name="dpd_classic" value="{{ old('dpd_classic') ?? $item->dpd_classic }}" class="form-control"></td>
                   <td><input type="number" step="0.01" placeholder="Cena" name="dpd_download" value="{{ old('dpd_classic') ?? $item->dpd_download }}" class="form-control"></td>
                   <td><input type="number" step="0.01" placeholder="Cena" name="inpost_classic" value="{{ old('dpd_classic') ?? $item->inpost_classic }}" class="form-control"></td>
                   <td><input type="number" step="0.01" placeholder="Cena" name="inpost_download" value="{{ old('dpd_classic') ?? $item->inpost_download }}" class="form-control"></td>
                   </tr>
                   <tr>
                       <td><button type="submit" class="btn btn-sm btn-outline-secondary">Zapisz</button></td>
                   </tr>
                </form>
            </tbody>
        </table>
@endsection
