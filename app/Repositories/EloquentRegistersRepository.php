<?php

namespace App\Repositories;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EloquentRegistersRepository implements RegistersRepository
{
    //FUNÇÂO PARA CADASTRAR NO BANCO
    public function add($id_model, $action, $model, $dataNew = null, $dataOld = null): Register
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS
        $data['user'] = Auth::user()->id;
        $data['id_model'] = $id_model;
        $data['action'] = $action;
        $data['model'] = $model;
        $data['unidade_id'] = Session::get('unidade');



        //VERIFICAÇÃO PARA DATA NULL
        if (!$dataNew && !$dataOld) {
            $data['data'] = null;
        } else {
            //OBTEM OS DADOS ALTERADOS
            unset($dataNew['updated_at']);
            $dataNew = array_intersect_key($dataNew,$dataOld);
            $dataOld = array_intersect_key($dataOld,$dataNew);
            $registros['novo'] = $dataNew;
            $registros['antigo'] = $dataOld;
            $data['data'] = json_encode($registros);
        }

        //OBTEM A UNIDADE

        $register = Register::create($data);

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();


        return $register;
    }
}
