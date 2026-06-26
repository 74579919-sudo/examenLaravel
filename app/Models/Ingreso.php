<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $table = 'ingresos';
    protected $fillable = ['proveedor_id', 'tipo_comprobante', 'num_comprobante', 'total'];

    /**
     * RELACIÓN: un ingreso pertenece a un proveedor
     */
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    /**
     * RELACIÓN: un ingreso se desglosa en muchos detalles de artículos
     */
    public function detalles()
    {
        return $this->hasMany(DetalleIngreso::class, 'ingreso_id');
    }

    /**
     * RELACIÓN AVANZADA (Puntos Extra): Muchos a Muchos indirecto con Productos
     */
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalles_ingresos', 'ingreso_id', 'producto_id')
                    ->withPivot('cantidad', 'precio_compra')
                    ->withTimestamps();
    }
}
