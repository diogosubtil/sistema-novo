<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportAnswer extends Model
{
    use HasFactory;

    //TABELA QUE A MODEL FAZ REFERENCIA NO BANCO DE DADOS
    protected $table = 'supports_answers';

    protected $fillable = [
        'support_id',
        'user',
        'unidade_id',
        'answer'
    ];

    //FUNÇAO DE RELACIONAMENTOS
    public function support()
    {
        return $this->belongsTo(Support::class);
    }
}
