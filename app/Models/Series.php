<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    //sempre que ouver uma query em Serie, o lazyloading será ignorado e as seasons serão retornadas em conjunto
    protected $with = ['seasons'];

    /* Define os campos que podem ser alterados no obj, o fillable ignora todos os 
    dados que não estão definidos no array*/
    protected $fillable = ['nome'];

    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }

    //escopo global
    public static function booted()
    {
        //toda vez que as series forem buscadas, retornaram ordenadas por conta do escopo global
        self::addGlobalScope('ordered', function (Builder $builder) {
            $builder->orderBy('nome');
        });
    }

    //escopo local que pode ser utilizado isoladamente
    public function scopeActive(Builder $builder)
    {
        return $builder->where('teste');
    }
}
