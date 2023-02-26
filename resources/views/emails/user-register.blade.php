@component('mail::message')
# Hola {{ $user->name }}

Ha sido registrado al sistema administrativo de {{ config('app.name') }}.

Puede ingresar con las siguientes credenciales:

@component('mail::panel')
Usuario: {{ $user->email }}
<br>
Contraseña: {{ $password }}
@endcomponent

@component('mail::button', ['url' => env('APP_URL')])
Entrar
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
