<?php

namespace App\Models;

use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Panoscape\History\HasHistories;

class Support extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    //TABELA QUE A MODEL FAZ REFERENCIA NO BANCO DE DADOS
    protected $table = 'supports';

    protected $fillable = [
        'user',
        'unidade_id',
        'status',
        'subject',
        'description'
    ];

    //SOFTDELETES
    protected $dates = ['deleted_at'];

    //Filter Eloquent
    private static array $whiteListFilter = ['*'];

    //FUNÇAO DE RELACIONAMENTOS
    public function answers()
    {
        return $this->hasMany(SupportAnswer::class);
    }

    //FUNÇÃO HISTORICO
    public function getModelLabel()
    {
        return $this->display_name;
    }
}
