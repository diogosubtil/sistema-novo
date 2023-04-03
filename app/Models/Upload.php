<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Panoscape\History\HasHistories;

class Upload extends Model
{
    use HasFactory, SoftDeletes, HasHistories;

    //TABELA QUE A MODEL FAZ REFERENCIA NO BANCO DE DADOS
    protected $table = 'uploads';

    protected $fillable = [
        'type',
        'type_id',
        'url',
        'name',
        'extension',
        'user',
    ];

    //SOFTDELETES
    protected $dates = ['deleted_at'];

    //FUNÇÃO HISTORICO
    public function getModelLabel()
    {
        return $this->display_name;
    }
}
