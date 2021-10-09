@extends('layouts.app')

@section('content')
<div class="content-wrapper pt-3">

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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="m-3 py-2">
                <x-btn nameBtn="Regresar" :slug="$slug.'.index'"></x-btn>
            </div>
            <x-form-container nameForm="Editar Materia Prima/Producto" :slug="$slug">
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route($slug.'.update', $data->id) }}" enctype="multipart/form-data">
                @method('PATCH') 
                    @csrf

                    <div class="card-body">
                        <div class="row">

                            {{-- code --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Codigo</label>
                                    <input type="text" name="code" class="form-control" id="code"
                                        value="{{$data->code}}" placeholder="Copy Magic">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="code" />
                            </div>

                            {{-- name --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="name" name="name" class="form-control" id="name"
                                        value="{{$data->name}}" placeholder="name">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="name" />
                            </div>

                            {{-- buy_date --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="buy_date">Fecha de compra</label>
                                    <input type="date" name="buy_date" class="form-control" id="buy_date"
                                        value="{{$data->buy_date}}" placeholder="">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="buy_date" />
                            </div>

                        
                             {{-- amount --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Cantidad</label>
                                 <input type="text" name="amount" class="form-control" id="amount"
                                        value="{{$data->amount}}" placeholder="Copy Magic">
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="amount" />
                            </div>

                               {{-- commetn --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="commetn">Comentarios</label>
                                    <textarea class="form-control" name="comment" id="comment" rows="5"
                                        placeholder="Comentario adicional al producto/materia prima"
                                        value="{{ old('comment') }}"></textarea>
                                </div>
                                <x-auth-validation-errors class="" :errors="$errors" campo="commetn" />
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