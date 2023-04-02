<?php

namespace App\Models;

use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Register extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    //TABELA QUE A MODEL FAZ REFERENCIA NO BANCO DE DADOS
    protected $table = 'registers';

    protected $fillable = [
        'user',
        'id_model',
        'action',
        'model',
        'data',
        'unidade_id',
    ];

    //SOFTDELETES
    protected $dates = ['deleted_at'];

    //Filter Eloquent
    private static array $whiteListFilter = ['*'];

    //FUNÇAO DE RELACIONAMENTOS
    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }
}
