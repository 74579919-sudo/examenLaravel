@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Gestión de Proveedores</h2>
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary" onclick="abrirModal()">Nuevo Proveedor</button>
        </div>
    </div>

    @include('proveedores.tabla')
</div>

@include('proveedores.modal')
@endsection

@section('scripts')
@include('proveedores.scripts')
@endsection