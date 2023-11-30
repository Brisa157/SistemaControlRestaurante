<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Platillos;
use App\Models\Ordenes;

class OrdenDetaills extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'platillo_id'];

    public function platillo()
    {
        return $this->belongsTo(Platillos::class, 'platillo_id');
    }

    public function orden()
    {
        return $this->belongsTo(Ordenes::class, 'order_id');
    }
}
