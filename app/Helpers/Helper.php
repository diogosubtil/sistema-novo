<?php

namespace App\Helpers;

use App\Models\Setting;
use App\Models\Unidade;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class Helper
{

    //FUNÇÃO PARA OBTER AS CONFIGURAÇÕES DO SISTEMA
    public static function settings(){

       return Setting::all()->first();

    }

    //FUNÇÃO PARA OBTER NOME DA FUNÇÃO DO USUARIO
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

    //FUNÇÃO PARA OBTER NOME DA UNIDADE
    public static function unidade($id)
    {
        $unidade =  optional(Unidade::query()->where('id', '=', $id)->first())->bairro;

        return $unidade;
    }

    //FUNÇÃO PARA VERIFICAR USUARIO ONLINE
    public static function online($id)
    {
        if (Cache::has('user-is-online-' . $id)){
            return 'text-success';
        } else {
            return 'text-danger';
        }
    }

    //OBTEM NOME DO USUARIO
    public static function getUserTittle($id)
    {
        $user = User::query()->where('id', '=', $id)->first()->name;

        return $user;
    }
}
