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

    </section>
</div>

@endsection