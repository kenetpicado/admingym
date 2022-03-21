@extends('layout')

@section('title', 'Reportes')

@section('contenido')
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-xxl-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <h4 class="card-title">REPORTES</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            foreach ($reportes as $reporte) {
                            ?>
                            <div class='alert alert-dark'>{{ $reporte->fecha_reporte }}: {{ $reporte->mensaje }}
                                <a href='{{ route('pagar', $reporte->cliente) }}'>: Volver a pagar</a>
                            </div>
                            <?php
                            }
                            ?>
                            <hr>
                            <a href="{{ route('reporte.delete') }}" class="btn btn-outline-danger">
                                Borrar todos los reportes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection('contenido')
