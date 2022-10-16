<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo-ag.png') }}">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body class="bg-light">

    @include('partials.topbar')

    <div class="container mb-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                @yield('bread')
            </ol>
        </nav>
        {{ $slot }}
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @livewireScripts
    <script>
        Livewire.on('close-create-modal', function() {
            document.getElementById("close-create-modal").click();
        });

        Livewire.on('open-create-modal', function() {
            $('#createModal').modal('show')
        });

        Livewire.on('open-pagar-modal', function() {
            $('#pagarModal').modal('show')
        });

        Livewire.on('close-pagar-modal', function() {
            $('#pagarModal').modal('hide')
        });
    </script>
</body>

</html>
