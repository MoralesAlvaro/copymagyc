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
            <x-form-container nameForm="Registro de Proovedores">
                <form method="POST" action="{{ route('supplier.store') }}">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            {{-- Name --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name-supplier">Nombre</label>
                                    <input type="text" name="name" class="form-control" id="name" required
                                        placeholder="Nombre del Proveedor" value="{{ old('name') }}">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="name" />
                            </div>

                            {{-- Address --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Dirección</label>
                                    <input type="text" name="address" class="form-control" id="address" required
                                        placeholder="Dirección del Proveedor" value="{{ old('address') }}">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="address" />
                            </div>

                            {{-- NRC --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nrc">NRC</label>
                                    <input type="nrc" name="nrc" class="form-control" id="nrc" required
                                        placeholder="Número de Registro de Contribuyente" maxlength="7" minlength="7"
                                        value="{{ old('nrc') }}">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="nrc" />
                            </div>

                            {{-- NIT --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nit">NIT</label>
                                    <input type="text" name="nit" class="form-control" id="nit" required
                                        placeholder="Número de Identificación Tributaria" maxlength="17" minlength="16"
                                        value="{{ old('nit') }}">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="nit" />
                            </div>

                            {{-- Company Type --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company-type">Tipo de compañia</label>
                                    <select name="company_type" class="form-control select2" style="width: 100%;"
                                        id="company_type" required placeholder=" tipo">
                                        <option value="Pequeña">Pequeña</option>
                                        <option value="Mediana">Mediana</option>
                                        <option value="Grande">Grande</option>
                                    </select>
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="company_type" />
                            </div>

                            {{-- Business --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business">Giro de empresa</label>
                                    <input type="text" name="business" class="form-control" id="business" required
                                        placeholder="Giro de la empresa" value="{{ old('business') }}">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="business" />
                            </div>

                            {{-- Phone --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telephone">Télefono</label>
                                    <input type="text" name="telephone"
                                        onkeypress="return validarEnteroEnCampo(telephone)" class="form-control"
                                        id="telephone" value="{{ old('telephone') }}" required placeholder="Télefono"
                                        maxlength="8" minlength="8">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="telephone" />
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{ old('email') }}" required placeholder="Email">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="email" />
                            </div>

                            {{-- Active --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="active">Tipo usuario</label>
                                    <select name="active" class="form-control select2" style="width: 100%;">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                                <x-auth-validation-errors class="" :errors=" $errors" campo="active" />
                            </div>


                        </div>
                    </div>

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