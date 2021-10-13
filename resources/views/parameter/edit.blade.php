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
      <x-form-container nameForm="Registro de Parametros">
        <form method="POST" action="{{ route('parameter.update') }}" enctype="multipart/form-data">
          @method('PATCH')
          @csrf

          <div class="card-body">
            <div class="row">
              {{-- Company Name --}}
              <div class="col-md-12">
                <div class="form-group">
                  <label for="name">Nombre de la compañia</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nombre de la compañia"
                    value="{{$data[0]->name}}">
                </div>
                <x-auth-validation-errors class="" :errors="$errors" campo="name" />
              </div>

              {{-- NIT Company--}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="representative_nit">NIT Representante</label>
                  <input type="number" name="representative_nit" class="form-control" id="representative_nit"
                    placeholder="NIT de la empresa" maxlength="17" pattern="^[0-9]+" min="1" step="1" value="{{$data[0]->representative_nit}}">
                </div>
                <x-auth-validation-errors class="" :errors="$errors" campo="representative_nit" />
              </div>

              {{-- logo_1 --}}
              <div class="col-md-6">
                <label for="logo_1">Buscar logo Principal</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Buscar</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="logo_1" name="logo_1" aria-describedby="logo_1">
                    <label class="custom-file-label" for="logo_1">Buscar Archivo</label>
                  </div>
                </div>
              </div>

              {{-- logo_2 --}}
              <div class="col-md-6">
                <label for="logo_2">Buscar logo Secundario</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Buscar</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="logo_2" name="logo_2" aria-describedby="logo_2">
                    <label class="custom-file-label" for="logo_2">Buscar Archivo</label>
                  </div>
                </div>
              </div>

              {{-- Phone --}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="telephone">Télefono</label>
                  <input type="number" name="telephone" class="form-control" id="telephone" placeholder="Télefono" maxlength="8" pattern="^[0-9]+" min="1" step="1"  value="{{$data[0]->telephone}}">
                </div>
                <x-auth-validation-errors class="" :errors="$errors" campo="telephone" />
              </div>

              {{-- Representative --}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="representative">Representante Legal</label>
                  <input type="text" name="representative" class="form-control" id="representative"
                    placeholder="Representante" value="{{$data[0]->representative}}">
                </div>
                <x-auth-validation-errors class="" :errors="$errors" campo="representative" />
              </div>

              {{-- NIT Representative--}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="company_nit">NIT de la mepresa</label>
                  <input type="number" name="company_nit" class="form-control" id="company_nit"
                    placeholder="NIT de la mepresa" maxlength="17" pattern="^[0-9]+" min="1" step="1"  value="{{$data[0]->company_nit}}">
                </div>
                <x-auth-validation-errors class="" :errors="$errors" campo="company_nit" />
              </div>

              {{-- Email --}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                    value="{{$data[0]->email}}">
                </div>
                <x-auth-validation-errors class="" :errors="$errors" campo="email" />
              </div>

              {{-- Address --}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address">Dirección</label>
                  <input type="text" name="address" class="form-control" id="address" placeholder="Email"
                    value="{{$data[0]->address}}">
                </div>
                <x-auth-validation-errors class="" :errors="$errors" campo="address" />
              </div>

              {{-- NRC--}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nrc">NRC</label>
                  <input type="number" name="nrc" class="form-control" id="nrc" placeholder="NRC"
                  maxlength="17" pattern="^[0-9]+" min="1" step="1"  value="{{$data[0]->nrc}}">
                </div>
                <x-auth-validation-errors class="" :errors="$errors" campo="nrc" />
              </div>

              {{-- company-type --}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="company-type">Tipo de compañia </label>
                  <select name="company_type" class="form-control select2" style="width: 100%;" id="company-type"
                    value="{{ $data[0]->company_type }}" placeholder="">
                    @if ($data[0]->company_type == 'Pequeña')
                    <option value="Pequeña">Pequeña</option>
                    <option value="Mediana">Mediana</option>
                    <option value="Grande">Grande</option>
                    @endif
                    @if ($data[0]->company_type == 'Mediana')
                    <option value="Mediana">Mediana</option>
                    <option value="Pequeña">Pequeña</option>
                    <option value="Grande">Grande</option>
                    @endif
                    @if ($data[0]->company_type == 'Grande')
                    <option value="Grande">Grande</option>
                    <option value="Mediana">Mediana</option>
                    <option value="Pequeña">Pequeña</option>
                    @endif
                  </select>
                  <x-auth-validation-errors class="" :errors=" $errors" campo="company-type" />
                </div>
              </div>

            </div>
          </div>

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