<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory, SoftDeletes;

    //TABELA QUE A MODEL FAZ REFERENCIA NO BANCO DE DADOS
    protected $table = 'notes';

    protected $fillable = [
        'client_id',
        'scheduling',
        'type',
        'startDate',
        'endDate',
        'typeScheduling',
        'text',
    ];

    //SOFTDELETES
    protected $dates = ['deleted_at'];

    //FUNÇAO DE RELACIONAMENTOS
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
