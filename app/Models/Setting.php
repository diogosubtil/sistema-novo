<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    //TABELA QUE A MODEL FAZ REFERENCIA NO BANCO DE DADOS
    protected $table = 'settings';

    protected $fillable = [
        'name',
        'color_primary',
        'color_secondary',
        'color_menu',
        'color_menu_letter',
        'color_menu_letter_active',
        'color_menu_title',
        'color_menu_icon',
        'color_login',
        'logo',
        'favicon',
    ];
}
