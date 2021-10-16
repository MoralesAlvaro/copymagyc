@extends('layouts.app')

@section('content')

@if (session('warning'))
        <div class="mx-1 ml-8">
            <div class="card-body">
                <div class="alert alert-warning text-center msg alert-dismissible fade show" id="success" role="alert">
                    <strong>{{ session('warning') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endif

<div id="emcabezado"><h2>Hola</h2></div>
<div class="content-wrapper pt-3">
<!-- Main content -->
<section class="content">
    <div class="m-2 px-4">
        <x-btn nameBtn="Atrás" :slug="'dashboard'"></x-btn>
    </div>
    <div class="container-fluid">
        <div class=" p-2 mt-2 ml-4">
        </div>
        <div class="col-md-12">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Registro de Usuarios</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('activity_raw.exportDate') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row">

                                {{-- inicio --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="from">Fecha inicial</label>
                                        <input type="date" name="from" class="form-control" id="from"
                                            required value="{{ old('from') }}">
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="from" />
                                </div>

                                {{-- fin --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="to">Fecha final</label>
                                        <input type="date" name="to" class="form-control" id="to"
                                            placeholder="to" required value="{{ old('name') }}">
                                    </div>
                                    <x-auth-validation-errors class="" :errors=" $errors" campo="to" />
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
                </div>
                <!-- /.card-body -->
            </div>



            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>


@endsection