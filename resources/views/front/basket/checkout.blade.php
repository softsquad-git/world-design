<form method="post" action="{{ route('checkout') }}">
    @csrf
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="name">Imię i Nazwisko</label>
            <input id="name" type="text" class="form-control"
                   plceholder="Imię" name="name" value="{{ Auth::user()->name ?? old('name') }}">
        </div>
        <div class="col-lg-6">
            <label for="email">E-mail</label>
            <input id="email" type="email" class="form-control"
                   plceholder="E-mail" name="email" value="{{ Auth::user()->email ?? old('email') }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4">
                    <label for="post_code">Kod pocztowy</label>
                    <input id="post_code" type="text" class="form-control"
                           plceholder="Kod pocztowy" value="{{ Auth::user()->contact->post_code ?? old('post_code') }}"
                           name="post_code">
                </div>
                <div class="col-lg-8">
                    <label for="city">Miasto</label>
                    <input id="city" type="text" class="form-control"
                           plceholder="Miasto" value="{{ Auth::user()->contact->city ?? old('city') }}" name="city">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12">
                    <label for="email">Adres</label>
                    <input id="email" type="text" class="form-control"
                           plceholder="Adres" value="{{ Auth::user()->contact->address ?? old('address') }}"
                           name="address">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4">
            <label for="phone">Telefon</label>
            <input id="phone" class="form-control" plceholder="Telefon"
                   value="{{ Auth::user()->contact->phone ?? old('phone')}}" name="phone" type="text">
        </div>
        <div class="col-lg-4">
            <label for="country">Kraj</label>
            <input id="country" class="form-control" plceholder="Kraj"
                   value="{{ Auth::user()->contact->country ?? old('country')}}" name="country" type="country">
        </div>
        <div class="col-lg-4">
            <label for="shipment">Wysyłka</label>
            <select id="shipment" name="shipment" class="form-control">
                <option value="" selected>Wybierz sposób dostawy</option>
                <option value="dpd_classic">Kurier DPD (przedpłata) ($ {{ Shipment::price('dpd_classic') }})</option>
                <option value="dpd_download">Kurier DPD (pobranie) ($ {{ Shipment::price('dpd_download') }})</option>
                <option value="inpost_classic">Paczkomat (przedpłata) ($ {{ Shipment::price('inpost_classic') }})</option>
                <option value="inpost_download">Paczkomat (pobranie) ($ {{ Shipment::price('inpost_download') }})</option>
            </select>
        </div>
        <input type="hidden" name="inpost_number" id="inpost_number">
    </div>
    <div id="inpost-shipment" class="form-group row">
        <div class="col-lg-12">
            <script async src="https://geowidget.easypack24.net/js/sdk-for-javascript.js"></script>
            <link rel="stylesheet" href="https://geowidget.easypack24.net/css/easypack.css"/>
            <div id="easypack-map"></div>
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary py-3 px-4" type="submit">Finalizuj</button>
    </div>
</form>
{{-- |-JS-| --}}
@section('custom-script')
    <script type="text/javascript">
        window.easyPackAsyncInit = function () {
            easyPack.init({});
            var map = easyPack.mapWidget('easypack-map', function (point) {
                console.log(point);
            });
        };

    </script>
    <script type="text/javascript">
        window.easyPackAsyncInit = function () {
            easyPack.init({
                defaultLocale: 'pl',
                mapType: 'osm',
                searchType: 'osm',
                points: {
                    types: ['parcel_locker']
                },
                map: {
                    initialTypes: ['parcel_locker']
                }
            });
            var map = easyPack.mapWidget('easypack-map', function (point) {
                var inpost_num = document.getElementById('inpost_number');
                inpost_num.value = point.name;
            });
        };
    </script>

@endsection
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#inpost-shipment').hide();
        $('#shipment').on('change', function() {
            if (this.value == 'inpost_classic' || this.value == 'inpost_download')
            {
                $("#inpost-shipment").show();
            }
            else
            {
                $("#inpost-shipment").hide();
            }
        });
    });
</script>
