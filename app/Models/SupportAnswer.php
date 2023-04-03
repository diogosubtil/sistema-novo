<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Panoscape\History\HasHistories;

class SupportAnswer extends Model
{
    use HasFactory, SoftDeletes, HasHistories;

    //TABELA QUE A MODEL FAZ REFERENCIA NO BANCO DE DADOS
    protected $table = 'supports_answers';

    protected $fillable = [
        'support_id',
        'user',
        'unidade_id',
        'answer'
    ];

    //SOFTDELETES
    protected $dates = ['deleted_at'];

    //FUNÇAO DE RELACIONAMENTOS
    public function support()
    {
        return $this->belongsTo(Support::class);
    }

    //FUNÇÃO PARA ORDENAR A LISTAGEM
    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder){
            $queryBuilder->orderBy('id', 'desc');
        });
    }

    //FUNÇÃO HISTORICO
    public function getModelLabel()
    {
        return $this->display_name;
    }
}
