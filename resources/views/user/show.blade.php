@extends('layouts.app')

@section('content')


<div class="content-wrapper pt-5">
    {{-- Notification --}}
    <div class="container">
        <!-- Mensaje de confirmación -->
        @if (session('success'))
        <div class="alert alert-success text-center msg alert-dismissible fade show" id="success" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!-- EDN Mensaje de confirmación -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="mx-2 my-2 py-1 px-1">
                <x-btn nameBtn="Retornar" :slug="$slug.'.index'" />
            </div>

            <x-card :result="$data->name.' '.$data->surname">
                <div class="col-5 text-center">
                    <x-img-card :src="$data->avatar" alt="Usuario: {{$data->name}}" class="img-circle img-fluid" />
                </div>
                <div class="col-7">
                    <x-p-card :result="$data->name.' '.$data->surname" nameLabel="Nombre" icono="fas fa-user" />
                    <x-p-card :result="$data->is_admin == 0 ? 'Empleado' : 'Administrador'" nameLabel="Tipo de Usuario"
                        icono="fas fa-user-check" />
                    <x-p-card :result="$data->email" nameLabel="Correo" icono="fas fa-envelope" />
                    <x-p-card :result="$data->active == 1 ? 'Activo' : 'Inactivo' " nameLabel="Estado"
                        icono="fas fa-user-shield" />
                    <div>
                        <a style="margin: 19px;" href="{{ route($slug.'.edit',$data->id)}}" class="btn btn-sm btn-primary sombra_boton">Editar</a>
                    </div>
                </div>
            </x-card>
    </section>
</div>

@endsection