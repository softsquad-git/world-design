<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>HEY !!!</title>
    <style>
        .card{
            padding: 35px;
            text-align: center;
        }input.form-control.is-required {
             border-color: red;
         }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <h1 style="margin-bottom: 30px;" class="center">Cześć niznajomy.</h1>
                <p>
                    Oddaję w Twoje ręce ukończony system zarządzania stroną i sklepem internetowym.
                    Mam nadzieję że będzie Ci godnie służył
                </p>
                <p>
                    Znajdujesz się na stronie gdzie rozpoczniesz konfigurację swojego systemu. <br/> Pola oznaczone czerwoną ramką są wymagane.
                </p>
                <form method="post" action="{{ route('admin.account.store') }}">
                    @csrf
                    <div class="form-group">
                        <input name="key" type="text" class="form-control is-required" placeholder="Klucz dostępu">
                    </div>
                    <div class="form-group">
                        <input name="name" type="text" class="form-control is-required" placeholder="Imię i nazwisko" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control is-required" placeholder="E-mail" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control is-required" placeholder="Hasło">
                    </div>
                    <div class="form-group">
                        <input name="country" type="text" class="form-control is-required" placeholder="Kraj" value="{{ old('country') }}">
                    </div>
                    <div class="form-group">
                        <input name="address" type="text" class="form-control" placeholder="Adres" value="{{ old('address') }}">
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <input name="post_code" type="text" class="form-control" placeholder="Kod Pocztowy" value="{{ old('post_code') }}">
                        </div>
                        <div class="col-lg-8">
                            <input name="city" type="text" class="form-control" placeholder="Miasto" value="{{ old('city') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="phone" type="text" class="form-control" placeholder="Telefon" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-secondary" type="submit">Dalej</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
