<?php

namespace App\Repositories;

use App\Http\Requests\ClientsFormRequest;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class EloquentClientsRepository implements ClientsRepository
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private RegistersRepository $repository)
    {
    }

    //FUNÇÃO PARA OBTER DADOS PARA O INDEX
    public function index(Request $request): array
    {
    }

    //FUNÇÂO PARA CADASTRAR NO BANCO
    public function add(ClientsFormRequest $request): Clients
    {
    }

    //FUNÇÃO PARA UPDATE NO BANCO
    public function edit(ClientsFormRequest $request, Clients $clients)
    {
    }

    //FUNÇÃO PARA DESATIVAR USUARIO
    public function disable(Clients $clients)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $clients->ativo = 'n';
        $clients->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();
    }

    //FUNÇÃO PARA ATIVAR USUARIO
    public function enable(Clients $clients)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $clients->ativo = 's';
        $clients->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();
    }

    //FUNÇÃO PARA EXCLUIR USUARIO
    public function delete(Clients $clients)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $clients->delete();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        //SALVA O REGISTRO
        $this->repository->add($clients->id,'ex','Clients');
    }

    //FUNÇÃO PARA MIGRAR
    public function migration()
    {
        $api = Http::get('https://unidade.espacoicelaser.com/migracao/clientes');
        dd($api->json()) ;
    }
}
