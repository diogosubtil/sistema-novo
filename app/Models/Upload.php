<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model
{
    use HasFactory, SoftDeletes;

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
}
