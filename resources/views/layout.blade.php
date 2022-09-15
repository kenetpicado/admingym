<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo-ag.png') }}">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="{{ asset('css/sb.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <style>
        .btn {
            width: 150px;
        }

        .btn-sm {
            width: 80px;
        }

        @media only screen and (max-width: 800px) {

            #dataTable tbody,
            #dataTable tr,
            #dataTable td {
                display: block;
            }

            #dataTable thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            #dataTable td {
                position: relative;
                padding-left: 30%;
                border: none;
                border-bottom: 1px solid #fff;
            }

            #dataTable td:before {
                content: attr(data-title);
                position: absolute;
                left: 2px;
                font-weight: bold;
            }

            #dataTable tr {
                border-bottom: 1px solid #aaaa;
            }
        }
    </style>
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

        @if (session('info'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('info') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @yield('contenido')
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>

    @if ($errors->any())
        <script>
            $('#agregar').modal('show')
        </script>
    @endif

    {{-- <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "ordering": false,
                "pageLength": 50,
            });
        });
    </script> --}}
</body>

</html>
