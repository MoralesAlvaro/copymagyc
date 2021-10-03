@extends('layouts.app')

@section('content')

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

<x-form-container nameForm="Registrar Usuarios">
  <!-- /.card-header -->
  <!-- form start -->
  <form method="POST" action="{{ route('user.store') }}">
    @csrf

    <div class="card-body">
      <div class="row">

        {{-- Email --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="email">Nombre</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="copymagic@gmail.com">
          </div>
        </div>

        {{-- Surname --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="surname">Apellidos</label>
            <input type="surname" name="surname" class="form-control" id="surname" placeholder="surname">
          </div>
        </div>

        {{-- Password --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="************">
          </div>
        </div>

        {{-- Confirm Password --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password_confirmation" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="************">
          </div>
        </div>

        {{-- Avatar --}}
        <div class="col-md-6">
          <label for="password_confirmation">Buscar foto de usuario</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="avatar">Buscar</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="avatar" name="avatar" aria-describedby="avatar">
              <label class="custom-file-label" for="avatar">Buscar Archivo</label>
            </div>
          </div>
        </div>

        {{-- is_admin --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="is_admin">Buscar foto de usuario</label>
            <select name="is_admin" class="form-control select2" style="width: 100%;">
              <option value="0">Empleado</option>
              <option value="1">Administrador</option>
            </select>
          </div>
        </div>


      </div>
    </div>
    <!-- /.card-body -->

    <div class="row">
      <div class="col-md-6">
        <div class="card-footer">
          <button type="submit" class="btn btn-info btn-lg btn-block">Submit</button>
        </div>
      </div>
    </div>
  </form>
</x-form-container>

@endsection