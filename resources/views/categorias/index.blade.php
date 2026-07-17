@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Gestión de Categorías</h2>
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary" onclick="abrirModal()">Nueva Categoría</button>
        </div>
    </div>

    <!-- Incluimos la tabla -->
    @include('categorias.tabla')
</div>

<!-- Incluimos el modal -->
@include('categorias.modal')
@endsection

@section('scripts')
<!-- Incluimos los scripts de la API -->
@include('categorias.scripts')
@endsection