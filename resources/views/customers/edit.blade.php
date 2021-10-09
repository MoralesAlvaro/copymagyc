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
      <x-form-container nameForm="Registrar Cliente">
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route($slug . '.update', $data->id) }}">
          @method('PATCH')
          @csrf

          <div class="card-body">
            {{-- Name --}}
            <div class="col-md-12">
              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" id="name" required="" placeholder="Copy Magic" value="{{ $data->name }}">
              </div>
              <x-auth-validation-errors class="" :errors=" $errors" campo="name" />
            </div>
            <div class="row">


              {{-- address --}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address">Direccion</label>
                  <input type="text" name="address" class="form-control" id="address" placeholder="Direccion Copy Magic" value="{{ $data->address }}">
                </div>
                <x-auth-validation-errors class="" :errors=" $errors" campo="address" />
              </div>

                {{-- nrc --}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nrc"> Número de Registro de Contribuyente</label>
                  <input type="text" required=""  name="nrc" class="form-control" id="nrc" placeholder="0000000" value="{{ $data->nrc }}">
                </div>
                <x-auth-validation-errors class="" :errors=" $errors" campo="nrc" />
              </div>

              {{-- nit --}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nit"> Número de nit</label>
                  <input type="text" required="" name="nit"  class="form-control" id="nit" placeholder="1234567891234567" value="{{ $data->nit }}">
                </div>
                <x-auth-validation-errors class="" :errors=" $errors" campo="nit" />
              </div>

              {{-- company_type --}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="company_type">Tipo de compañia</label>
                  <select name="company_type" id="company_type" class="form-control select2" style="width: 100%;">
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
                </div>
                <x-auth-validation-errors class="" :errors=" $errors" campo="company_type" />
              </div>

              {{--   business --}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="business"> Giro de empresa</label>
                  <input type="text" name="business" class="form-control" id="business" placeholder="Principal Actividad de la empresa" value="{{ $data->business }}">
                </div>
                <x-auth-validation-errors class="" :errors=" $errors" campo="business" />
              </div>

                {{-- Active --}}
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="active">Tipo usuario</label>
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

              {{-- user_id --}}
              <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
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
    </div>
    <!-- /.container-fluid -->
  </section>
<!-- /.content -->
</div>

@endsection