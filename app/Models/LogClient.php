<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogClient extends Model
{
    use HasFactory, SoftDeletes;

    //TABELA QUE A MODEL FAZ REFERENCIA NO BANCO DE DADOS
    protected $table = 'clients_log';

    protected $fillable = [
      'client_id',
      'user_id',
      'info',
    ];

    //SOFTDELETES
    protected $dates = ['deleted_at'];

    //FUNÇAO DE RELACIONAMENTOS
    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}
