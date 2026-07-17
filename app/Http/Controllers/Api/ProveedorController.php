<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        return response()->json(Proveedor::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'razon_social' => 'required|string|max:150',
            'ruc' => 'required|string|max:20|unique:proveedores,ruc',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
        ]);

        $proveedor = Proveedor::create($request->all());
        return response()->json($proveedor, 201);
    }

    public function show(string $id)
    {
        $proveedor = Proveedor::find($id);
        if (!$proveedor) {
            return response()->json(['message' => 'Proveedor no encontrado'], 404);
        }

        return response()->json($proveedor, 200);
    }

    public function update(Request $request, string $id)
    {
        $proveedor = Proveedor::find($id);
        if (!$proveedor) {
            return response()->json(['message' => 'Proveedor no encontrado'], 404);
        }

        $request->validate([
            'razon_social' => 'required|string|max:150',
            'ruc' => 'required|string|max:20|unique:proveedores,ruc,'.$proveedor->id,
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
        ]);

        $proveedor->update($request->all());
        return response()->json($proveedor, 200);
    }

    public function destroy(string $id)
    {
        $proveedor = Proveedor::find($id);
        if (!$proveedor) {
            return response()->json(['message' => 'Proveedor no encontrado'], 404);
        }

        $proveedor->delete();
        return response()->json(['mensaje' => 'Proveedor eliminado correctamente'], 200);
    }
}
