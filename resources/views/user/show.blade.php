@extends('layouts.app')

@section('content')


<div class="content-wrapper pt-5">
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
            <div class="mx-2 my-2 py-1 px-1">
                <x-btn nameBtn="Retornar" :slug="$slug.'.index'" />
            </div>

            <x-card :result="$data->name.' '.$data->surname">
                <div class="col-5 text-center">
                    <x-img-card :src="$data->avatar" alt="Usuario: {{$data->name}}" class="img-circle img-fluid" />
                </div>
                <div class="col-7">
                    <x-p-card :result="$data->name.' '.$data->surname" nameLabel="Nombre" icono="fas fa-user" />
                    <x-p-card :result="$data->is_admin == 0 ? 'Empleado' : 'Administrador'" nameLabel="Tipo de Usuario"
                        icono="fas fa-user-check" />
                    <x-p-card :result="$data->email" nameLabel="Correo" icono="fas fa-envelope" />
                    <x-p-card :result="$data->active == 1 ? 'Activo' : 'Inactivo' " nameLabel="Estado"
                        icono="fas fa-user-shield" />
                    <div>
                        <a style="margin: 19px;" href="{{ route($slug.'.edit',$data->id)}}"
                            class="btn btn-sm btn-primary sombra_boton">Editar</a>

                        <td>
                            <!-- Cambiar contraseña en modal -->
                            <button type="submit" class="btn btn-sm btn-success" data-toggle="modal"
                                data-target="#modal-{{$data->id}}">
                                Cambiar contraseña
                            </button>
                        </td>
                    </div>

                </div>
            </x-card>
    </section>
</div>

<!-- Modal password-->
<div class="modal fade" id="modal-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-purple">
                <p class="text-center">Cambiar contraseña<i class="fa fa-commenting-o fa-4x"></i></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_eliminar" action="{{ url('update-password')}}" method="post">
                    @csrf

                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id }}">
                    <div class="card-body ">
                        <div class="row">
                            {{-- Password --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input required type="password" name="password" class="form-control" id="password"
                                        placeholder="************" value="{{ old('name') }}">
                                </div>
                                <x-auth-validation-errors class="" :errors=" $errors" campo="password" />
                            </div>

                            {{-- Confirm Password --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmar Contraseña</label>
                                    <input required type="password" name="password_confirmation" class="form-control"
                                        id="password_confirmation" placeholder="************" value="{{ old('name') }}">
                                </div>
                                <x-auth-validation-errors class="" :errors=" $errors" campo="password" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" id="ko">Cancelar</button>
                    <button type="submit" class="btn btn-sm btn-success" id="ok">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal password-->
@endsection