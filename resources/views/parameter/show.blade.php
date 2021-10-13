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

            </div>
            <x-card :result="$data[0]->name">
                <div class="col-6 text-justify">
                    <div class="col-5 text-center">
                        <p class="text-muted"><b><i class=""></i>Logo 1</b></p>
                        <x-img-card :src="$data[0]->logo_1" alt="Logo 1: {{$data[0]->logo_1}}"
                            class="img-circle img-fluid" />
                        <br>
                        <p class="text-muted"><b><i class=""></i>Logo 2</b></p>
                        <x-img-card :src="$data[0]->logo_2" alt="Logo 1: {{$data[0]->logo_2}}" class="img-fluid" />
                    </div>
                </div>

                <div class="col-6 text-justify">
                    <x-p-card :result="$data[0]->name" nameLabel="Nombre" icono="fas fa-building" />
                    <x-p-card :result="$data[0]->representative" nameLabel="Logo secundario"
                        icono="fas fa-building" />
                    <x-p-card :result="$data[0]->telephone" nameLabel="Telefono" icono="fas fa-building" />
                    <x-p-card :result="$data[0]->email" nameLabel="Correo Electrónico" icono="fas fa-building" />
                    <x-p-card :result="$data[0]->address" nameLabel="Dirección" icono="fas fa-building" />
                    <x-p-card :result="$data[0]->company_nit" nameLabel="NIT de la Empresa" icono="fas fa-building" />
                    <x-p-card :result="$data[0]->representative_nit" nameLabel="NIT del Representante" icono="fas fa-building" />
                    <x-p-card :result="$data[0]->company_type" nameLabel="Tipo de Compañia" icono="fas fa-building" />
                    <x-p-card :result="$data[0]->nrc" nameLabel="NRC de la Compañia" icono="fas fa-building" />

                    <a style="margin: 19px;" href="{{ route($slug . '.edit') }}"
                        class="btn btn-sm btn-primary sombra_boton">Editar</a>
                </div>
        </div>
        </x-card>


    </section>
</div>

@endsection