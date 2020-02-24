<form method="post" action="{{ route('checkout') }}">
    @csrf
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="name">Imię</label>
            <input id="name" type="text" class="form-control"
                   plceholder="Imię" name="name">
        </div>
        <div class="col-lg-6">
            <label for="last_name">Nazwisko</label>
            <input id="last_name" type="text" class="form-control"
                   plceholder="Nazwisko" name="last_name">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4">
                    <label for="post_code">Kod pocztowy</label>
                    <input id="post_code" type="text" class="form-control"
                           plceholder="Kod pocztowy" name="post_code">
                </div>
                <div class="col-lg-8">
                    <label for="city">Miasto</label>
                    <input id="city" type="text" class="form-control"
                           plceholder="Miasto" name="city">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label for="street">Ulica</label>
                    <input id="street" type="text" class="form-control"
                           plceholder="Ulica" name="street">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="number_home">Numer domu</label>
                    <input id="number_home" type="text" class="form-control"
                           plceholder="Numer domu" name="number_home">
                </div>
                <div class="col-lg-6">
                    <label for="number_local">Numer mieszkania</label>
                    <input id="number_local" type="text" class="form-control"
                           plceholder="Numer mieszkania" name="number_local">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12">
                    <label for="email">E-mail</label>
                    <input id="email" type="email" class="form-control"
                           plceholder="E-mail" name="email">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label for="phone">Telefon</label>
                    <input id="phone" type="text" class="form-control"
                           plceholder="Telefon" name="number_phone">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label for="shipment">Wysyłka</label>
                    <select id="shipment" name="shipment" class="form-control">
                        <option value="" selected>Wybierz sposób dostawy</option>
                        <option value="dpd_classic">Kurier DPD (przedpłata)</option>
                        <option value="dpd_download">Kurier DPD (pobranie)</option>
                        <option value="inpost">InPost</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
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
            var map = easyPack.mapWidget('easypack-map', function(point){
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
            var map = easyPack.mapWidget('easypack-map', function(point) {
                alert(point.name);
            });
        };
    </script>
@endsection
