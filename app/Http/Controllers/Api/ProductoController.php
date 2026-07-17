<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
public function index()
    {
        // Usamos 'with' para traer también los datos de la categoría asociada
        $productos = Producto::with('categoria')->get();
        return response()->json($productos, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|integer|exists:categorias,id',
            'nombre' => 'required|string|max:100',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $producto = Producto::create($request->all());
        return response()->json($producto, 201);
    }

    public function show(string $id)
    {
        $producto = Producto::with('categoria')->find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        return response()->json($producto, 200);
    }

    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        $request->validate([
            'categoria_id' => 'required|integer|exists:categorias,id',
            'nombre' => 'required|string|max:100',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        $producto->update($request->all());
        return response()->json($producto, 200);
    }

    public function destroy(string $id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->delete();
        return response()->json(['mensaje' => 'Producto eliminado correctamente'], 200);
    }
}
