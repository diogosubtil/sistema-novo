<?php

namespace App\Repositories;

use App\Http\Requests\UnidadesFormRequest;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloquentUnidadesRepository implements UnidadesRepository
{

    //FUNÇÃO PARA OBTER DADOS PARA O INDEX
    public function index(): array
    {
        //OBTEM AS UNIDADE
        $data['unidades'] = Unidade::query()->paginate(15);

        //OBTEM ATIVOS,DESATIVADOS,ONLINE
        $data['ativos'] = 0;
        $data['desativados'] = 0;
        foreach ($data['unidades'] as $unidade){
            if ($unidade->ativo == 's'){
                $data['ativos']++;
            }
            if ($unidade->ativo == 'n'){
                $data['desativados']++;
            }
        }

        return $data;
    }

    //FUNÇÂO PARA CADASTRAR NO BANCO
    public function add(UnidadesFormRequest $request): Unidade
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O CADASTRO
        $data = $request->except('_token');
        $unidade = Unidade::create($data);

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        //RETORNA A UNIDADE CRIADA
        return $unidade;
    }

    //FUNÇÃO PARA UPDATE NO BANCO
    public function edit(UnidadesFormRequest $request, Unidade $unidade)
    {

        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O UPDATE
        $data = $request->except('_token');
        $unidade->fill($data);
        $unidade->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

    }

    //FUNÇÃO PARA DESATIVAR USUARIO
    public function disable(Unidade $unidade)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O UPDATE
        $unidade->ativo = 'n';
        $unidade->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

    }

    //FUNÇÃO PARA ATIVAR USUARIO
    public function enable(Unidade $unidade)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O UPDATE
        $unidade->ativo = 's';
        $unidade->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

    }
}
