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

<div class="content-wrapper pt-3">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-purple">
                        <div class="card-header">
                            <h3 class="card-title">Registro De Clientes </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                       
                                        <th></th>
                                        
                                        <th>Ver</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        
                                        <td>
                                            <a href="#"
                                                class="btn btn-sm btn-success">Ver</a>
                                        </td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-sm btn-primary">Editar</a>
                                        </td>
                                        <td> 
                                            <!-- Eliinar el registro a travez del modal que está más abajo -->
                                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal Eliminar-->
                                    <div class="modal fade" id="#" tabindex="-1" role="dialog"
                                        aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="text-center">Eliminar Registro<i
                                                            class="fa fa-commenting-o fa-4x"></i></p>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="p-2 bg-danger text-white">¿En serio quieres eliminar el
                                                        registro?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-dismiss="modal" id="ko">No</button>
                                                    <form id="form_eliminar"
                                                        action="" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            id="ok">Si</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Eliminar-->


                                    
                                </tbody>
                                <tfoot>
                                 
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

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
@endsection