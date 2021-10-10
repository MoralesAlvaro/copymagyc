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
                <x-card :result="$data->name.' '.$data->name">
                    <div class="col-6 text-justify">
                            <x-p-card :result="$data->name" nameLabel="Nombre" icono="fas fa-heading" />
                            <x-p-card :result="$data->color" nameLabel="Color" icono="fas fa-palette" />
                    </div>

                    <div class="col-6 text-justify">
                        
                        <x-p-card :result="$data->size" nameLabel="Tamaño" icono="fas fa-ruler" />
                        <x-p-card :result="$data->material" nameLabel="Material" icono="fas fa-weight-hanging" />
                        <div>
                            <a style="margin: 19px;" href="{{ route($slug . '.edit', $data->id) }}"
                                class="btn btn-sm btn-primary sombra_boton">Editar</a>
                        </div>
                    </div>
                </x-card>


        </section>
</div>

@endsection