<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    //TABELA QUE A MODEL FAZ REFERENCIA NO BANCO DE DADOS
    protected $table = 'supports';

    protected $fillable = [
        'user',
        'unidade_id',
        'status',
        'subject',
        'description'
    ];

    //FUNÇAO DE RELACIONAMENTOS
    public function answers()
    {
        return $this->hasMany(SupportAnswer::class);
    }
}
