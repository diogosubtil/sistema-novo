<?php

namespace App\Repositories;

use App\Helpers\Helper;
use App\Http\Requests\UsersFormRequest;
use App\Models\Client;
use App\Models\LogClient;
use App\Models\Register;
use App\Models\Unidade;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;

class EloquentLogsClientsRepository implements LogsClientsRepository
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct()
    {
    }

    //FUNÇÂO PARA CADASTRAR NO BANCO
    public function add(Request $request): LogClient
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();
        $client = Client::where('id', $request->client_id)->first();

        //OBTEM OS DADOS DO REQUEST E FAZ O CADASTRO
        $data = $request->except('_token');
        $data['user_id'] = Auth::user()->id;
        $data['info'] = 'O usuário <strong>' . Auth::user()->name . '</strong> transferiu o cliente <strong>' . $client->nome . '</strong> da unidade <strong>' . Helper::getUnidadeTitle($client->unidade_id) . '</strong> para a unidade <strong>' . Helper::getUnidadeTitle($request->unidade_id) . '</strong>';

        $log = LogClient::create($data);

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        return $log;
    }

    //FUNÇÃO PARA MIGRAR
    public function migration()
    {
        //FUNÇÃO PARA PODER SETAR O ID
        LogClient::unguard();

        //OBTEM OS DADOS
        $api = Http::get('https://unidade.espacoicelaser.com/migracao/clientes-logs');
        $total = count($api->json());
        $att = 0;
        $add = 0;

        //ADD OS DADOS
        foreach ($api->json() as $log) {

            //OBTEM USUARIO PARA VERIFICAÇÃO DE UPDADE OU CADASTRO
            $getLog = LogClient::where('id', $log['id'])->withTrashed()->first();

            if ($getLog) {

                $getLog->id = $log['id'];
                $getLog->client_id = $log['cliente'];
                $getLog->user_id = $log['usuario'];
                $getLog->info = $log['info'];
                $getLog->created_at = $log['dataCadastro'];
                $getLog->updated_at = $log['dataAtualizacao'];
                $getLog->save();

                $att++;

            } else {

                LogClient::create([
                    'id' => $log['id'],
                    'client_id' => $log['cliente'],
                    'user_id' => $log['usuario'],
                    'info' => $log['info'],
                    'created_at' => $log['dataCadastro'],
                    'updated_at' => $log['dataAtualizacao']
                ]);

                $add++;

            }

        }

        echo 'Total de Logs: ' . $total . '<br>';
        echo 'Atualizados: ' . $att . '<br>';
        echo 'Cadastrados: ' . $add . '<br>';

    }
}
