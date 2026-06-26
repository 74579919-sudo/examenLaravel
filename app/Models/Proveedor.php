<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $fillable = ['razon_social', 'ruc', 'telefono', 'email'];

    /**
     * RELACIÓN: un proveedor tiene muchos ingresos de mercadería
     */
    public function ingresos()
    {
        return $this->hasMany(Ingreso::class, 'proveedor_id');
    }
}
