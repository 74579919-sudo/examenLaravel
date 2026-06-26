<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
use HasFactory;

    protected $table = 'productos';
    protected $fillable = ['categoria_id', 'nombre', 'descripcion', 'stock', 'precio_venta', 'codigo_barras'];

    /**
     * RELACIÓN: un producto pertenece a una categoría
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    /**
     * RELACIÓN: un producto aparece en muchos detalles de ingresos
     */
    public function detallesIngresos()
    {
        return $this->hasMany(DetalleIngreso::class, 'producto_id');
    }
}
