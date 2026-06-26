<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    use HasFactory;

    protected $table = 'detalles_ingresos';
    protected $fillable = ['ingreso_id', 'producto_id', 'cantidad', 'precio_compra'];

    /**
     * RELACIÓN: este detalle pertenece a un ingreso de cabecera
     */
    public function ingreso()
    {
        return $this->belongsTo(Ingreso::class, 'ingreso_id');
    }

    /**
     * RELACIÓN: este detalle hace referencia a un producto específico
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
