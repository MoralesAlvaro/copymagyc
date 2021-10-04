@extends('layouts.app')
@section('content')

<div class="container">
  <div>

  </div>
</div>
<x-form-container nameForm="Registro de Proovedores">
  <form method="POST" action="{{ route('supplier.store') }}">
    @csrf

    <div class="card-body">
      <div class="row">
        {{-- Name --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="name-supplier">Nombre</label>
            <input type="text" name="name-supplier" class="form-control" id="name-supplier" placeholder="Nombre proveedor">
          </div>
        </div>

        {{-- Address --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" name="address-supplier" class="form-control" id="address-supplier" placeholder="Dirección">
          </div>
        </div>

        {{-- NRC--}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="nrc">NRC</label>
            <input type="nrc" name="nrc" class="form-control" id="nrc" placeholder="NRC">
          </div>
        </div>

        {{-- NIT--}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="nit">NIT</label>
            <input type="text" name="nit" class="form-control" id="nit" placeholder="NIT">
          </div>
        </div>

        {{-- Company Type--}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="company-type">Tipo de compañia</label>
            <input type="text" name="company-type" class="form-control" id="company-type" placeholder="Tipo de Compañia">
          </div>
        </div>

        {{-- Business --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="business">Negocio</label>
            <input type="text" name="business" class="form-control" id="business" placeholder="Negocio">
          </div>
        </div>

        {{-- Phone --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="telephone">Télefono</label>
            <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Télefono">
          </div>
        </div>

        {{-- Phone --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
          </div>
        </div>

        {{-- DUI --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="dui">DUI</label>
            <input type="text" name="dui" class="form-control" id="dui" placeholder="DUI">
          </div>
        </div>


      </div>
    </div>

    <div class="row">

      <div class="col-md-6">
        {{-- Active --}}
        <div class="form-group pl-4 pb-1">
          <label for="active">Activar Proveedor</label>
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