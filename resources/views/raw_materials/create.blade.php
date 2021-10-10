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
            <x-form-container nameForm="Registrar Materia Prima" :slug="$slug">
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('rawMaterials.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- user_id --}}
                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">

                    <div class="card-body">
                        <div class="row">

                            {{-- code --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Código</label>
                                    <input type="text" name="code" class="form-control" id="code"
                                        placeholder="Código de materia prima" value="{{ old('code') }}">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="code" />
                            </div>

                            {{-- name --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="name" name="name" class="form-control" id="name"
                                        placeholder="nombre de materia prima" value="{{ old('name') }}">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="name" />
                            </div>

                            {{-- buy_date --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="buy_date">Fecha</label>
                                    <input type="date" name="buy_date" class="form-control" id="buy_date"
                                        placeholder="fecha de compra" value="{{ old('buy_date') }}">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="buy_date" />
                            </div>

                            {{-- amount --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Cantidad</label>
                                    <input type="number" name="amount" class="form-control" id="amount"
                                        placeholder="Cantidad de producto ingresando" pattern="^[0-9]+" min="1" step="1" value="{{ old('amount') }}">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="amount" />
                            </div>

                            {{-- Suppliers - stationeryTypes --}}
                            <div class="col-md-6">
                                <div>
                                    <div class="form-group">
                                        <label for="company-type">Proveedor</label>
                                        <select name="supplier_id" class="form-control select2" style="width: 100%;"
                                            id="supplier_id" required placeholder=" tipo">
                                            @foreach($suppliers as $key)
                                            <option value="{{$key->id}}">{{$key->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-auth-validation-errors class="" :errors="$errors" campo="supplier_id" />
                                </div>

                                {{-- stationeryTypes --}}
                                <div class="">
                                    <div class="form-group">
                                        <label for="stationery_type_id">Tipo Papelería</label>
                                        <select name="stationery_type_id" class="form-control select2"
                                            style="width: 100%;" id="stationery_type_id" required placeholder=" tipo">
                                            @foreach($stationeryTypes as $datos)
                                            <option value="{{$datos->id}}">{{$datos->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-auth-validation-errors class="" :errors="$errors" campo="stationery_type_id" />
                                </div>
                            </div>

                            {{-- comment --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="comment">Comentarios</label>
                                    <textarea class="form-control" name="comment" id="comment" rows="5"
                                        placeholder="Comentario adicional al producto/materia prima"
                                        value="{{ old('comment') }}"></textarea>
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="comment" />
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