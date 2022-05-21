@component('mail::message')
# Recibo virtual

@component('mail::panel')
Se ha realizado un pago por la cantidad de <strong>C$ {{$plan->monto}}</strong>
<br>
<strong>{{date('d - F - Y')}}</strong>

@endcomponent

@component('mail::table')
|Descripción        |
|---------------|
|Cliente: {{$plan->cliente->nombre}}      |
|Servicio: {{$plan->servicio}}      |
|Plan: {{$plan->plan}} |
|Expira: <strong>{{date("d - F - Y",  strtotime($plan->fecha_fin))}}</strong> |
@endcomponent

Gracias, <strong>{{ config('app.name') }}</strong> <i>“Tu gym, tu transformación”</i>
@endcomponent
