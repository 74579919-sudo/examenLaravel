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
        $ingreso = Ingreso::create($request->all());
        return response()->json($ingreso, 201);
    }

    public function show(string $id)
    {
        $ingreso = Ingreso::with(['proveedor', 'detalles.producto'])->findOrFail($id);
        return response()->json($ingreso, 200);
    }

    public function update(Request $request, string $id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->update($request->all());
        return response()->json($ingreso, 200);
    }

    public function destroy(string $id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->delete();
        return response()->json(['mensaje' => 'Ingreso eliminado correctamente'], 200);
    }
}
