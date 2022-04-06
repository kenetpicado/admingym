@component('mail::message')
# Recibo virtual

@component('mail::panel')
Se ha realizado un pago por la cantidad de <strong>C$ {{$caja->monto}}</strong>
<br>
<strong>{{date('d - F - Y')}}</strong>

@endcomponent

@component('mail::table')
|Descripción        |
|---------------|
|Cliente: {{$caja->cliente->nombre}}      |
|Servicio: {{$caja->servicio}}      |
|Plan: {{$caja->plan}} |
|Expira: <strong>{{$caja->fecha_fin}}</strong> |
@endcomponent

Gracias, <strong>{{ config('app.name') }}</strong> <i>“Tu gym, tu transformación”</i>
@endcomponent
