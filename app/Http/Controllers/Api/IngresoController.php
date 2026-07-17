<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ingreso;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    public function index()
    {
        // Traemos el ingreso junto con los datos de su proveedor y detalles
        $ingresos = Ingreso::with(['proveedor', 'detalles'])->get();
        return response()->json($ingresos, 200);
    }

    public function store(Request $request)
    {
            $request->validate([
            'proveedor_id' => 'required|integer|exists:proveedores,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
        ]);

        $ingreso = Ingreso::create($request->all());
        return response()->json($ingreso, 201);
    }

    public function show(string $id)
    {
        $ingreso = Ingreso::with(['proveedor', 'detalles.producto'])->find($id);

        if (!$ingreso) {
            return response()->json(['message' => 'Ingreso no encontrado'], 404);
        }

        return response()->json($ingreso, 200);
    }

    public function update(Request $request, string $id)
    {
        $ingreso = Ingreso::find($id);

        if (!$ingreso) {
            return response()->json(['message' => 'Ingreso no encontrado'], 404);
        }

        $request->validate([
            'proveedor_id' => 'required|integer|exists:proveedores,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
        ]);

        $ingreso->update($request->all());
        return response()->json($ingreso, 200);
    }

    public function destroy(string $id)
    {
        $ingreso = Ingreso::find($id);
        if (!$ingreso) {
            return response()->json(['message' => 'Ingreso no encontrado'], 404);
        }

        $ingreso->delete();
        return response()->json(['mensaje' => 'Ingreso eliminado correctamente'], 200);
    }
}
