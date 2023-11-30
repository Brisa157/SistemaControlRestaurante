<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Platillos;


class Categorias extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function platillos()
    {
        return $this->hasMany(Platillos::class);
    }
}
