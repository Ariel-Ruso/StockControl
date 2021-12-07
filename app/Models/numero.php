<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class numero extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad', 'numero', 'color', 'articulos_id' ];
}
