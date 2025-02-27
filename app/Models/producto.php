<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $fillable = ['nombre', 'precio', 'ruta_archivo']; // Agrega ruta_archivo
}
