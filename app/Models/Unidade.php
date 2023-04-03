<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Panoscape\History\HasHistories;

class Unidade extends Model
{
    use HasFactory, SoftDeletes, HasHistories;

    //TABELA QUE A MODEL FAZ REFERENCIA NO BANCO DE DADOS
    protected $table = 'unidades';

    protected $fillable = [
        'cnpj',
        'cep',
        'bairro',
        'cidade',
        'estado',
        'whatsapp',
        'dataAbertura',
        'meta',
        'gerente',
        'endereco',
        'numero',
        'timezone',
        'assinatura',
    ];

    //SOFTDELETES
    protected $dates = ['deleted_at'];

    //FUNÇAO DE RELACIONAMENTOS
    public function users()
    {
        return $this->hasMany(User::class);
    }

    //FUNÇAO DE RELACIONAMENTOS
    public function registers()
    {
        return $this->hasMany(Register::class);
    }

    //FUNÇAO DE RELACIONAMENTOS
    public function supports()
    {
        return $this->hasMany(Support::class);
    }

    //FUNÇÃO HISTORICO
    public function getModelLabel()
    {
        return $this->display_name;
    }
}
