<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetalleIngreso;
use Illuminate\Http\Request;

class DetalleIngresoController extends Controller
{
public function index()
    {
        return response()->json(DetalleIngreso::all(), 200);
    }

    public function store(Request $request)
    {
        $detalle = DetalleIngreso::create($request->all());
        return response()->json($detalle, 201);
    }

    public function show(string $id)
    {
        $detalle = DetalleIngreso::findOrFail($id);
        return response()->json($detalle, 200);
    }

    public function update(Request $request, string $id)
    {
        $detalle = DetalleIngreso::findOrFail($id);
        $detalle->update($request->all());
        return response()->json($detalle, 200);
    }

    public function destroy(string $id)
    {
        $detalle = DetalleIngreso::findOrFail($id);
        $detalle->delete();
        return response()->json(['mensaje' => 'Detalle eliminado correctamente'], 200);
    }
}
