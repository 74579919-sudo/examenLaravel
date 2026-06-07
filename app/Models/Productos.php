<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'categoria_id',
        'nombre',
        'descripcion',
        'stock',
        'precio_venta',
        'codigo_barras'
    ];


    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }
}
