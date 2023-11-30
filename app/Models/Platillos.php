<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Categorias;
use App\Models\OrdenDetaills;
use Illuminate\Database\Eloquent\Model;

class Platillos extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'categoria_id', 'precio', 'imagen'];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }

    public function ordenDetallis()
    {
        return $this->hasMany(OrdenDetaills::class, 'order_id');
    }
}
