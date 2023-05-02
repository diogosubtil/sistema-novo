<?php

namespace App\Repositories;

use App\Http\Requests\UnidadesFormRequest;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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

    //FUNÇÃO PARA DESATIVAR UNIDADE
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

    //FUNÇÃO PARA ATIVAR UNIDADE
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

    //FUNÇÃO PARA ATIVAR USUARIO
    public function delete(Unidade $unidade)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //DELETA A UNIDADE
        $unidade->delete();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

    }

    //FUNÇÃO PARA MIGRAR
    public function migration()
    {
        //FUNÇÃO PARA PODER SETAR O ID
        Unidade::unguard();

        //OBTEM OS DADOS
        $api = Http::get('https://unidade.espacoicelaser.com/migracao/unidades');

        $total = count($api->json());
        $att = 0;
        $add = 0;

        //ADD OS DADOS
        foreach ($api->json() as $unidade) {

            //OBTEM USUARIO PARA VERIFICAÇÃO DE UPDADE OU CADASTRO
            $getUnidade = Unidade::where('id', $unidade['id'])->first();

            if ($getUnidade) {

                $getUnidade->cnpj = $unidade['cnpj'];
                $getUnidade->cep = $unidade['cep'];
                $getUnidade->bairro = $unidade['bairro'];
                $getUnidade->cidade = $unidade['cidade'];
                $getUnidade->estado = $unidade['estado'];
                $getUnidade->whatsapp = $unidade['whatsapp'];
                $getUnidade->dataAbertura = $unidade['dataAbertura'];
                $getUnidade->meta = $unidade['meta'];
                $getUnidade->gerente = $unidade['gerente'];
                $getUnidade->endereco = $unidade['endereco'];
                $getUnidade->numero = $unidade['numero'];
                $getUnidade->timezone = $unidade['timezone'];
                $getUnidade->assinatura = $unidade['assinatura'];
                $getUnidade->ativo = $unidade['ativo'];
                $getUnidade->created_at = $unidade['dataCadastro'];
                $getUnidade->updated_at = $unidade['dataAtualizacao'];
                $getUnidade->save();

                $att++;
            } else {

                Unidade::create([
                    'id' => $unidade['id'],
                    'cnpj' => $unidade['cnpj'],
                    'cep' => $unidade['cep'],
                    'bairro' => $unidade['bairro'],
                    'cidade' => $unidade['cidade'],
                    'estado' => $unidade['estado'],
                    'whatsapp' => $unidade['whatsapp'],
                    'dataAbertura' => $unidade['dataAbertura'],
                    'meta' => $unidade['meta'],
                    'gerente' => $unidade['gerente'],
                    'endereco' => $unidade['endereco'],
                    'numero' => $unidade['numero'],
                    'timezone' => $unidade['timezone'],
                    'assinatura' => $unidade['assinatura'],
                    'ativo' => $unidade['ativo'],
                    'created_at' => $unidade['dataCadastro'],
                    'updated_at' => $unidade['dataAtualizacao'],
                ]);

                $add++;
            }
        }


        echo 'Total de undiades: ' . $total . '<br>';
        echo 'Atualizadas: ' . $att . '<br>';
        echo 'Cadastradas: ' . $add . '<br>';
    }
}
