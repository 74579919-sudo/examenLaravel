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
            $request->validate([
            'ingreso_id' => 'required|integer|exists:ingresos,id',
            'producto_id' => 'required|integer|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_compra' => 'required|numeric',
        ]);

        $detalle = DetalleIngreso::create($request->all());
        return response()->json($detalle, 201);
    }

    public function show(string $id)
    {
        $detalle = DetalleIngreso::find($id);

        if (!$detalle) {
            return response()->json(['message' => 'Detalle de ingreso no encontrado'], 404);
        }

        return response()->json($detalle, 200);
    }

    public function update(Request $request, string $id)
    {
        $detalle = DetalleIngreso::find($id);
        if (!$detalle) {
            return response()->json(['message' => 'Detalle de ingreso no encontrado'], 404);
        }
        $request->validate([
            'ingreso_id' => 'required|integer|exists:ingresos,id',
            'producto_id' => 'required|integer|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_compra' => 'required|numeric',
        ]);
        $detalle->update($request->all());
        return response()->json($detalle, 200);
    }

    public function destroy(string $id)
    {
        $detalle = DetalleIngreso::find($id);
        if (!$detalle) {
            return response()->json(['message' => 'Detalle de ingreso no encontrado'], 404);
        }
        $detalle->delete();
        return response()->json(['mensaje' => 'Detalle eliminado correctamente'], 200);
    }
}
