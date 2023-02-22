<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    //TABELA QUE A MODEL FAZ REFERENCIA NO BANCO DE DADOS
    protected $table = 'notifications';

    protected $fillable = [
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
        'seen',
    ];
}
