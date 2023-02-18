<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\SupportAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EloquentSupportsAnswersRepository implements SupportsAnswersRepository
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private UploadsRepository $repository)
    {
    }

    //FUNÇÂO PARA CADASTRAR NO BANCO
    public function add(Request $request): SupportAnswer
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O CADASTRO
        $data = $request->except('_token');
        $supportAnswer = SupportAnswer::create($data);

        if ($request->file){
            $this->repository->add(21, $supportAnswer->id, $request->file);
        }


        //OBTEM O SUPORTE E VERIFICA O USUARIO PARA DEFINIR O STATUS DO SUPORTE
        $support = Support::query()->where('id', '=', $supportAnswer->support_id)->first();
        if (Auth::user()->funcao == 1) {
            $status['status'] = 3;
        } else {
            $status['status'] = 2;
        }
        $support->fill($status);
        $support->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        //RETORNA A UNIDADE CRIADA
        return $supportAnswer;
    }
}
