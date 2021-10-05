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

<x-form-container nameForm="Registrar Cliente">
  <!-- /.card-header -->
  <!-- form start -->
  <form method="POST" action="{{ route('customers.store') }}">
    @csrf

    <div class="card-body">
      <div class="row">

        {{-- Name --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre de cliente">
          </div>
        </div>

        {{-- address --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="address">Direccion</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Direccion">
          </div>
        </div>

          {{-- nrc --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="nrc"> Número de Registro de Contribuyente</label>
            <input type="text" name="nrc" class="form-control" id="nrc" placeholder="">
          </div>
        </div>

        {{-- nit --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="nit"> Número de nit</label>
            <input type="text" name="nit" class="form-control" id="nit" placeholder="">
          </div>
        </div>

        {{-- company_type --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="company_type">tipo de compañia</label>
           <select name="company_type" class="form-control select2" style="width: 100%;">
              <option value="">Pequeña</option>
              <option value="">Mediana</option>
              <option value="">Grande</option>

            </select> 
          </div>
        </div>

         {{--   business --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="business"> Giro de empresa</label>
            <input type="text" name="business" class="form-control" id="business" placeholder="giro">
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  <div class="row">

      <div class="col-md-6">
        {{-- Active --}}
        <div class="form-group pl-4 pb-1">
          <label for="active">Activar cliente</label>
          <div class="custom-switch">
            <input type="checkbox" class="custom-control-input" id="active" name="active">
            <label class="custom-control-label" for="active">Inactivo - Activo</label>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card-footer">
          <button type="submit" class="btn btn-info btn-lg btn-block">Submit</button>
        </div>
      </div>
    </div>
  </form>
</x-form-container>

@endsection