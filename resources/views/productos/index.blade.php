@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Gestión de Productos</h2>
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary" onclick="abrirModal()">Nuevo Producto</button>
        </div>
    </div>

    @include('productos.tabla')
</div>

@include('productos.modal')
@endsection

@section('scripts')
@include('productos.scripts')
@endsection