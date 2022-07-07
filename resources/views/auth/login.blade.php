<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo-ag.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - Login</title>
    <link href="css/sb-admin-2.css" rel="stylesheet">
</head>

<body class="bg-primary">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center mb-4">
                                <img src="{{ asset('img/logo-ag.png') }}" alt="" srcset="" width="15%">
                            </div>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">{{ config('app.name') }}</h1>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <x-input-form label="username" text="Usuario"></x-input-form>
                                <x-input-form label="password" text="Contraseña" type="password"></x-input-form>

                                <div class="form-group">
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordarme') }}
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
