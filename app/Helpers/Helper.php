<?php

namespace App\Helpers;

use App\Models\Setting;
use App\Models\Unidade;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class Helper
{
    //FUNÇÃO PARA OBTER AS CONFIGURAÇÕES DO SISTEMA
    public static function settings(){

       return Setting::all()->first();

    }

    //FUNÇÃO PARA OBTEM NIVEL DE ACESSO
    public static function requireFuncao($funcao)
    {
        $funcoesUsuario = explode(',', Auth::user()->funcao);
        $funcoes        = explode(',', $funcao);
        foreach ($funcoes as $funcao) {
            if (in_array($funcao, $funcoesUsuario)) {
                return true;
            }
        }
    }

    //FUNÇÃO PARA OBTER NOME DA FUNÇÃO DO USUARIO
    public static function getTitleFuncao($number)
    {
        switch ($number) {
            case 1:
                echo 'Master';
                break;
            case 2:
                echo 'Gerente';
                break;
            case 3:
                echo 'Aplicador(a)';
                break;
            case 4:
                echo 'Recepção/Vendedor';
                break;
           case 10:
                echo 'Cliente';
                break;
        }
    }

    //FUNÇÃO PARA OBTER NOME DA UNIDADE
    public static function getUnidadeTitle($id)
    {
        $unidade =  optional(Unidade::query()->where('id', '=', $id)->first());
        $unidade = $unidade->bairro. ' - ' . $unidade->cidade . ' - ' . $unidade->estado;

        return $unidade;
    }

    //FUNÇÃO PARA OBTER AS UNIDADES DO USUARIO
    public static function getUnidades()
    {
        $unidades =  User::query()->where('id', '=', Auth::user()->id)->first()->unidade_id;
        $unidadesUser = explode(',',$unidades);

        return $unidadesUser;
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
    public static function getUserTitle($id)
    {
        $user = User::query()->where('id', '=', $id)->first()->name;

        return $user;
    }

    public static function getUser($id)
    {
        $user = User::query()->where('id', '=', $id)->first();

        return $user;
    }

    //FUNÇÃO PARA OBTER AS TIME ZONES
    public static function timezones()
    {
        //TIMEZONES BRASIL
        $timezones = array(
            'AC' => 'America/Rio_branco',   'AL' => 'America/Maceio',
            'AP' => 'America/Belem',        'AM' => 'America/Manaus',
            'BA' => 'America/Bahia',        'CE' => 'America/Fortaleza',
            'DF' => 'America/Sao_Paulo',    'ES' => 'America/Sao_Paulo',
            'GO' => 'America/Sao_Paulo',    'MA' => 'America/Fortaleza',
            'MT' => 'America/Cuiaba',       'MS' => 'America/Campo_Grande',
            'MG' => 'America/Sao_Paulo',    'PR' => 'America/Sao_Paulo',
            'PB' => 'America/Fortaleza',    'PA' => 'America/Belem',
            'PE' => 'America/Recife',       'PI' => 'America/Fortaleza',
            'RJ' => 'America/Sao_Paulo',    'RN' => 'America/Fortaleza',
            'RS' => 'America/Sao_Paulo',    'RO' => 'America/Porto_Velho',
            'RR' => 'America/Boa_Vista',    'SC' => 'America/Sao_Paulo',
            'SE' => 'America/Maceio',       'SP' => 'America/Sao_Paulo',
            'TO' => 'America/Araguaia',
        );

        return $timezones;
    }

    //FUNÇÃO PARA OBTER TIPO DE REGISTRO
    public static function getRegisterTipo($tipo)
    {
        switch ($tipo) {
            case 'c':
                echo 'Cadastro';
                break;
            case 'e':
                echo 'Edição';
                break;
            case 'ex':
                echo 'Exclusão';
                break;
        }
    }

    //FUNÇÃO PARA OBTER COR STATUS SUPORTE
    public static function getColorSupport($status)
    {
        switch ($status) {
            case '1':
                echo 'label-primary';
                break;
            case '2':
                echo 'label-warning';
                break;
            case '3':
                echo 'label-danger';
                break;
            case '4':
                echo 'label-success';
                break;
        }
    }

    //FUNÇÃO PARA OBTER COR STATUS SUPORTE
    public static function getStatusSupport($status)
    {
        switch ($status) {
            case '1':
                echo 'Novo';
                break;
            case '2':
                echo 'Usuario Respondeu';
                break;
            case '3':
                echo 'Suporte Respondeu';
                break;
            case '4':
                echo 'Concluido';
                break;
        }
    }
}
