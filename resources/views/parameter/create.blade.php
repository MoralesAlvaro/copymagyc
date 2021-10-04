@extends('layouts.app')
@section('content')

<div class="container">
  <div>

  </div>
</div>
<x-form-container nameForm="Registro de Parametros">
  <form method="POST" action="{{ route('parameter.store') }}">
    @csrf

    <div class="card-body">
      <div class="row">
        {{-- Company Name --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="company-name">Nombre de la compañia</label>
            <input type="text" name="company-name" class="form-control" id="company-name" placeholder="Nombre de la compañia">
          </div>
        </div>

        {{-- NIT Company--}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="nit-company">NIT Representante</label>
            <input type="text" name="nit-company" class="form-control" id="nit-representative" placeholder="NIT de la comap">
          </div>
        </div>

        {{-- Logo --}}
        <div class="col-md-6">
          <label for="logo">Buscar logo</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Buscar</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="logo" name="logo" aria-describedby="logo">
              <label class="custom-file-label" for="logo">Buscar Archivo</label>
            </div>
          </div>
        </div>

        {{-- Phone --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="telephone">Télefono</label>
            <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Télefono">
          </div>
        </div>

        {{-- Representative --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="representative">Representante</label>
            <input type="text" name="representative" class="form-control" id="representative" placeholder="Representante">
          </div>
        </div>

        {{-- NIT Representative--}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="nit-representative">NIT Representante</label>
            <input type="text" name="nit-representative" class="form-control" id="nit-representative" placeholder="NIT Representante">
          </div>
        </div>

        {{-- Email --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
          </div>
        </div>

        {{-- Address --}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Email">
          </div>
        </div>

        {{-- NRC--}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="nrc">NRC</label>
            <input type="nrc" name="nrc" class="form-control" id="nrc" placeholder="NRC">
          </div>
        </div>


        {{-- Company Type--}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="company-type">Tipo de compañia</label>
            <input type="text" name="company-type" class="form-control" id="company-type" placeholder="Tipo de Compañia">
          </div>
        </div>

      </div>
    </div>

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