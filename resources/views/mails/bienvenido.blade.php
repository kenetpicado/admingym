@component('mail::message')
# ¡Bienvenido!


@component('mail::panel')
Por este medio se le notifica que <strong>{{$cliente->nombre}}</strong> es cliente activo 
en nuestro local.
@endcomponent



Así mismo lo usaremos como recurso para notificar cuando realice un nuevo pago o 
su plan esté próximo a vencer.

Recuerde que este método sirve como un <strong>recibo virtual</strong> que estaremos enviando con su consentimiento.

Gracias, <strong>{{ config('app.name') }}</strong> <i>“Tu gym, tu transformación”</i>
@endcomponent
