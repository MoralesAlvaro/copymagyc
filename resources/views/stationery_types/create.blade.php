@extends('layouts.app')

@section('content')

{{-- Notification --}}
<div class="content-wrapper pt-3">
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
            <div class="m-3 py-2">
                <x-btn nameBtn="Regresar" :slug="$slug.'.index'"></x-btn>
            </div>
            <x-form-container nameForm="Registrar Materia Prima" :slug="$slug">
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('stationeryTypes.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">

                            {{-- name --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Nombre del tipo de Materia Prima" value="{{ old('name') }}">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="name" />
                            </div>

                            {{-- color --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" name="color" class="form-control" id="color"
                                        placeholder="Color de materia prima" value="{{ old('color') }}">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="color" />
                            </div>

                            {{-- material --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="material">Tipo Papelería</label>
                                    <select name="material" class="form-control select2" style="width: 100%;"
                                        id="material" required placeholder=" tipo">
                                        <option value="Papeliería">Papeliería</option>
                                        <option value="Promocionales">Promocionales</option>
                                    <option value="Suminisitros">Suministros</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="material" />
                            </div>

                            {{-- size --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="size">Tamaño</label>
                                    <input type="text" name="size" class="form-control" id="size"
                                        placeholder="Tamaño del tipo la materia prima" value="{{ old('size') }}">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="amount" />
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="row">

                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-lg btn-block">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </x-form-container>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>



@endsection