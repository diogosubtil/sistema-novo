<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Panoscape\History\HasHistories;

class Unidade extends Model
{
    use HasFactory, HasHistories;

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

    //FUNÇÃO HISTORICO
    public function getModelLabel()
    {
        return $this->display_name;
    }
}
