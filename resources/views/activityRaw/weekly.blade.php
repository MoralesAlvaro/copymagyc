@extends('layouts.app')

@section('content')

<div id="emcabezado"><h2>Hola</h2></div>
<div class="content-wrapper pt-3">
<!-- Main content -->
<section class="content">
    <div class="m-2 px-4">
        <x-btn nameBtn="Nuevo" :slug="'dashboard'"></x-btn>
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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                @foreach($encabezados as $key)
                                <th>{{$key}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $datos)
                            <tr>
                                @foreach($campos as $campo)
                                <td>{{$datos->$campo}}</td>
                                @endforeach
                                
                            </tr>
                            
                            
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                @foreach($encabezados as $key)
                                <th>{{$key}}</th>
                                @endforeach
                            </tr>
                            
                        </tfoot>
                    </table>
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