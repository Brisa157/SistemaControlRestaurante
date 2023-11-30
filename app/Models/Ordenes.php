<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrdenDetaills;

class Ordenes extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'fecha'];

    public function ordenDetallis()
    {
        return $this->hasMany(OrdenDetaills::class, 'order_id');
    }
}
