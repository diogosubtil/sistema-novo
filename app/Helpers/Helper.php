<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class Helper
{
    //FUNÇÃO PARA OBTER NOME DA FUNÇÃO
    public static function funcao($number)
    {
        switch ($number) {
            case 1:
                echo 'Master';
                break;
            case 2:
                echo 'Gerente';
                break;
            case 3:
                echo 'Aplicadora';
                break;
        }
    }

    //FUNÇÃO PARA OBTER NOME DA FUNÇÃO
    public static function unidade($number)
    {
        switch ($number) {
            case 1:
                echo 'Campina Grande';
                break;
            case 2:
                echo 'João Pessoa';
                break;
            case 3:
                echo 'Belém';
                break;
        }
    }

    //FUNÇÃO PARA OBTER NOME DA FUNÇÃO
    public static function online($id)
    {
        if (Cache::has('user-is-online-' . $id)){
            return 'bg-success';
        } else {
            return 'bg-danger';
        }
    }

    //OBTEM NOME DO USUARIO
    public static function getUserTittle($id)
    {
        $user = User::query()->where('id', '=', $id)->get()->first()->name;

        return $user;
    }
}
