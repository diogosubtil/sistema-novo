<?php

namespace App\Models;

use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory, Filterable;

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

    //Filter Eloquent
    private static array $whiteListFilter = ['*'];

    //FUNÇAO DE RELACIONAMENTOS
    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }
}
