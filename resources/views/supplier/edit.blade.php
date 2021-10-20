@extends('layouts.app')

@section('content')
    <div class="content-wrapper pt-3">

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
                <div class="m-3 py-2">
                    <x-btn nameBtn="Regresar" :slug="$slug.'.index'"></x-btn>
                </div>
                <x-form-container nameForm="Editar Proveedores " :slug="$slug">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route($slug . '.update', $data->id) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="card-body">
                            <div class="row">

                                {{-- Name --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ $data->name }}" placeholder="">
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="name" />
                                </div>

                                {{-- address --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Direccion</label>
                                        <input type="text" name="address" class="form-control" id="address"
                                            value="{{ $data->address }}" placeholder="Dirección">
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="address" />
                                </div>

                                {{-- nrc --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nrc">NRC</label>
                                        <input type="text" name="nrc" class="form-control" id="nrc" maxlength="7" minlength="7" value="{{ $data->nrc }}" placeholder="">
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="nrc" />
                                </div>


                                {{-- nit --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nit">NIT</label>
                                        <input type="text" name="nit" class="form-control" id="nit"
                                            value="{{ $data->nit }}" placeholder="" maxlength="17" minlength="17">
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="nit" />
                                </div>

                                {{-- company-type --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company-type">Tipo de compañia </label>
                                        <select name="company_type" class="form-control select2" style="width: 100%;"
                                            id="company-type" value="{{ $data->company_type }}" placeholder="">
                                            @if ($data->company_type == 'Pequeña')
                                            <option value="Pequeña">Pequeña</option>
                                            <option value="Mediana">Mediana</option>
                                            <option value="Grande">Grande</option>
                                            @endif
                                            @if ($data->company_type == 'Mediana')
                                            <option value="Mediana">Mediana</option>
                                            <option value="Pequeña">Pequeña</option>
                                            <option value="Grande">Grande</option>
                                            @endif
                                            @if ($data->company_type == 'Grande')
                                            <option value="Grande">Grande</option>
                                            <option value="Mediana">Mediana</option>
                                            <option value="Pequeña">Pequeña</option>
                                            @endif
                                        </select>
                                        <x-auth-validation-errors class="" :errors=" $errors" campo="company-type" />
                                    </div>
                                </div>

                                {{-- business --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business">Giro de empresa</label>
                                        <input type="text" name="business" id="business" class="form-control" id="business"
                                            value="{{ $data->business }}" placeholder="">
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="business" />
                                </div>

                                {{-- Phone --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone">Telefono</label>
                                        <input type="text" name="telephone" class="form-control" id="telephone"
                                            value="{{ $data->telephone }}" placeholder="" maxlength="8" minlength="8">
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="telephone" />
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            required placeholder="Email" value="{{ $data->email}}">
                                    </div>
                                    <x-auth-validation-errors class="" :errors="$errors" campo="email" />
                                </div>

                                {{-- Active --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="active">Estado de Proveedor</label>
                                        <select name="active" class="form-control select2" style="width: 100%;">
                                            @if ($data->active == 1)
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            @else
                                                <option value="0">Inactivo</option>
                                                <option value="1">Activo</option>
                                            @endif
                                        </select>
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="active" />
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="row m-4">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <button type="submit" class="btn btn-info btn-lg btn-block text-dark">Enviar</button>
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
