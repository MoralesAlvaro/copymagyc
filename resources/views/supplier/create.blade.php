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
                        <select name="company_type" class="form-control select2" style="width: 100%;" id="company-type"
                                         placeholder=" tipo">
                                 <option value="">Pequeña</option>
                                 <option value="">Mediana</option>
                                <option value="">Grande</option>

                                    </select> 

                    </div>
                  </div>

                  {{-- Business --}}
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="business">Negocio</label>
                      <input type="text" name="business" class="form-control" id="business" placeholder="Giro de la empresa">
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