<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo-ag.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - Login</title>
    <link href="css/app.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container">
        <div class="d-flex flex-column">
            <div style="display: grid; place-items: center; min-height: 100vh;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="text-center mb-4">
                        <img src="{{ asset('img/logo-ag.png') }}" alt="" srcset="" width="50px">
                    </div>
                    <h4 class="text-center mb-2 text-primary font-weight-bold">{{ config('app.name') }}</h4>
                    <h6 class="text-center text-muted mb-4">Dashboard</h6>

                    <x-input name="email" type="email"></x-input>
                    <x-input name="password" type="password"></x-input>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Recordarme</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block w-100">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
