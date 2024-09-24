<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    /* Define os campos que podem ser alterados no obj, o fillable ignora todos os 
    dados que não estão definidos no array*/
    protected $fillable = ['nome'];
}
