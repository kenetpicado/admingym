@extends('layout')

@section('title', 'Perfil')

@section('contenido')
    <div class="card">
        <x-header-0>Perfil</x-header-0>

        <x-edit-form ruta='user.update' :id="$user->id">
            <x-input name="name" label="Nombre" :val="$user->name"></x-input>
            <x-input name="username" label="Usuario" :val="$user->username"></x-input>
        </x-edit-form>

        <x-edit-form ruta='password' :id="$user->id">
            <x-input name="password" label="Cambiar contrasena" type="password"></x-input>
            <x-input name="password_confirmation" label="Confirmar contrasena" type="password"></x-input>
        </x-edit-form>
    </div>
@endsection
