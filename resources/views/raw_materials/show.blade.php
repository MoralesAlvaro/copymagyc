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
                <x-card :result="$data->name">
                    <div class="col-6 text-justify">
                            <x-p-card :result="$data->code" nameLabel="Código" icono="fas fa-barcode" />
                            <x-p-card :result="$data->name" nameLabel="Nombre" icono="fas fa-barcode" />
                            <x-p-card :result="$data->buy_date" nameLabel="Fecha de Compra" icono="fas fa-calendar-alt" />
                            <x-p-card :result="$data->amount" nameLabel="Cantidad" icono="fas fa-cart-plus" />
                    </div>

                    <div class="col-6 text-justify">
                        
                        <x-p-card :result="$data->supplier->name" nameLabel="Proveedor" icono="fas fa-building" />
                        <x-p-card :result="$data->stationeryType->name" nameLabel="Tipo" icono="fas fa-building" />
                        <x-p-card :result="$data->user->name.' '.$data->user->surname " nameLabel="Registrado por" icono="fas fa-user" />
                        <x-p-card :result="$data->comment" nameLabel="Comentario" icono="fas fa-align-justify" />
                        <div>
                            <a style="margin: 19px;" href="{{ route($slug . '.edit', $data->id) }}"
                                class="btn btn-sm btn-primary sombra_boton">Editar</a>
                        </div>
                    </div>
                </x-card>


        </section>
</div>

@endsection