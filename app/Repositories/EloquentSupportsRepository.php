<?php

namespace App\Repositories;

use App\Http\Requests\SupportsFormRequest;
use App\Models\Support;
use Illuminate\Support\Facades\DB;

class EloquentSupportsRepository implements SupportsRepository
{

    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private UploadsRepository $repository)
    {
    }

    //FUNÇÂO PARA CADASTRAR NO BANCO
    public function add(SupportsFormRequest $request): Support
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O CADASTRO
        $data = $request->except('_token');
        $supporte = Support::create($data);

        if ($request->file){
            $this->repository->add(20,$supporte->id,$request->file);
        }

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        //RETORNA A UNIDADE CRIADA
        return $supporte;
    }

    //FUNÇÃO PARA UPDATE NO BANCO
    public function edit(SupportsFormRequest $request, Support $support)
    {

        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O UPDATE
        $data = $request->except('_token');
        $support->fill($data);
        $support->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

    }

    //FUNÇÃO PARA DESATIVAR USUARIO
    public function disable(Support $support)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O UPDATE
        $support->ativo = 'n';
        $support->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

    }

    //FUNÇÃO PARA ATIVAR USUARIO
    public function enable(Support $support)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O UPDATE
        $support->ativo = 's';
        $support->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

    }
}
