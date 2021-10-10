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
                <x-form-container nameForm="Registrar Usuarios" :slug="$slug">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row">

                                {{-- Name --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Copy Magic" value="{{ old('name') }}">
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="name" />
                                </div>

                                {{-- Surname --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="surname">Apellidos</label>
                                        <input type="surname" name="surname" class="form-control" id="surname"
                                            placeholder="surname" value="{{ old('name') }}">
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="surname" />
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Correo</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="copymagic@gmail.com" value="{{ old('name') }}">
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="email" />
                                </div>

                                {{-- Password --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="************" value="{{ old('name') }}">
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="password" />
                                </div>

                                {{-- Confirm Password --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirmar Contraseña</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="password_confirmation" placeholder="************" value="{{ old('name') }}">
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="password" />
                                </div>

                                {{-- Avatar --}}
                                <div class="col-md-6">
                                    <label for="avatar">Buscar foto de usuario</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="avatar">Buscar</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="avatar" name="avatar"
                                                aria-describedby="avatar" value="{{ old('name') }}">
                                            <label class="custom-file-label" for="avatar">Buscar Archivo</label>
                                        </div>
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="avatar" />
                                </div>

                                {{-- is_admin --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="is_admin">Estado</label>
                                        <select name="is_admin" class="form-control select2" style="width: 100%;">
                                            <option value="0">Empleado</option>
                                            <option value="1">Administrador</option>
                                        </select>
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="is_admin" />
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
