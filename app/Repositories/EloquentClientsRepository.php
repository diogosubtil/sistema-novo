<?php

namespace App\Repositories;

use App\Http\Requests\ClientsFormRequest;
use App\Http\Requests\TransferFormRequest;
use App\Models\Client;
use App\Models\LogClient;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class EloquentClientsRepository implements ClientsRepository
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private UploadsRepository $uploadsRepository, private RegistersRepository $repository, private LogsClientsRepository $logsClientsRepository)
    {
    }

    //FUNÇÃO PARA OBTER DADOS PARA O INDEX
    public function index(Request $request): array
    {
        //OBTEM OS CLIENTES
        $data['clients'] = Client::query()
            ->where('unidade_id', '=' ,Session::get('unidade'))
            ->orderBy('nome')
            ->filter($request->all());

        $data['femininos'] = 0;
        $data['masculino'] = 0;

        foreach ($data['clients']->get() as $client) {
            $client->sexo == 'f' ? $data['femininos']++ : $data['masculino']++;
        }

        return $data;
    }

    //FUNÇÂO PARA CADASTRAR NO BANCO
    public function add(ClientsFormRequest $request): Client
    {

        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O CADASTRO

        $data = $request->except('_token');
        $data['unidade_id'] = Session::get('unidade');
        $data['senha'] = Hash::make($data['senha']);
        $client = Client::create($data);

        //UPLOAD DOS ARQUIVOS
        if ($request->foto){
            $this->uploadsRepository->add(2,$client->id,$request->foto, $client->id);
        }

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        return $client;
    }

    //FUNÇÃO PARA UPDATE NO BANCO
    public function edit(Request $request, Client $client)
    {
        //VALIDAÇÃO DO CPF
        if ($request->cpf != $client->cpf){
            $request->validate([
                'cpf' => ['required', 'unique:clients', 'string','max:255'],
            ],[
                'cpf.unique' => 'Este CPF já está sendo utilizado.'
            ]);
        }

        //VALIDAÇÃO DO SENHA
        if ($request->senha != null){
            $request->validate([
                'senha' => ['min:8'],
            ],[
                'senha.min' => 'A senha deve conter no minimo 8 caracteres.'
            ]);
        }

        //VALIDAÇÕES
        $request->validate([
            'nome' => ['required', 'string','max:255'],
            'sexo' => ['required', 'string','max:255'],
            'estado_civil' => ['required', 'string','max:255'],
            'dataNascimento' => ['required', 'string','max:255'],
        ],[
            'nome.required' => 'O campo nome é obrigatório',
            'sexo.required' => 'O campo sexo é obrigatório',
            'estado_civil.required' => 'O campo estado civil é obrigatório',
            'dataNascimento.required' => 'O campo data de nascimento é obrigatório',
            'cpf.required' => 'O campo cpf é obrigatório',
        ]);

        //INICIA A TRANSAÇÃO
        DB::beginTransaction();
        //OBTEM OS DADOS DO REQUEST E FAZ O CADASTRO
        $data = $request->except('_token');
        $data['senha'] == null ? $data['senha'] = $client->senha : $data['senha'] = Hash::make($request->senha);
        $data['unidade_id'] = Session::get('unidade');
        $data['diabetes'] = $request->diabetes ?? null;
        $data['cardiaco'] = $request->cardiaco ?? null;
        $data['hormonal'] = $request->hormonal ?? null;
        $data['foliculite'] = $request->foliculite ?? null;
        $data['doenca_de_pele'] = $request->doenca_de_pele ?? null;
        $data['fotossensiveis'] = $request->fotossensiveis ?? null;
        $data['queloides'] = $request->queloides ?? null;
        $data['alergico'] = $request->alergico ?? null;
        $data['herpes'] = $request->herpes ?? null;
        $data['epilepsia'] = $request->epilepsia ?? null;
        $data['neoplasias_metastases'] = $request->neoplasias_metastases ?? null;
        $data['medicamentos'] = $request->medicamentos ?? null;
        $data['doenca_autoimune'] = $request->doenca_autoimune ?? null;
        $data['gestante'] = $request->gestante ?? null;
        $data['lactante'] = $request->lactante ?? null;
        $data['tratamento'] = $request->tratamento ?? null;
        $data['filtro_solar'] = $request->filtro_solar ?? null;
        $data['exposicao_sol'] = $request->exposicao_sol ?? null;
        $data['roacutan'] = $request->roacutan ?? null;
        $data['medic_fotossensiveis'] = $request->medic_fotossensiveis ?? null;
        $data['anabolizante'] = $request->anabolizante ?? null;
        $data['acidos'] = $request->acidos ?? null;
        $data['laser'] = $request->laser ?? null;
        $data['tatuagem_micropig'] = $request->tatuagem_micropig ?? null;
        $data['reacoes'] = $request->reacoes ?? null;
        $client->fill($data);
        $client->save();

        //UPLOAD DOS ARQUIVOS
        if ($request->foto){
            $this->uploadsRepository->add(2,$client->id,$request->foto, $client->id);
        }

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

    }

    //FUNÇÃO PARA OBTER DADOS PARA A VIEW SHOW
    public function show(Client $client)
    {
        //OBTEM OS DADOS
        $data['client'] = Client::where('id', $client->id)->first();

        //OBTEM OS LOGS
        $data['logs'] = LogClient::where('client_id', $client->id)->get();

        //OBTEM A FOTO DO CLIENTE
        $photo = Upload::query()
            ->where('type', '=','2')
            ->where('type_id', '=', $client->id)
            ->orderByDesc('id')
            ->first();
        //VERIFICA SE EXISTE UPLOAD DE FOTO
        $photo ? $data['photo'] = $photo->url :
            ($data['client']->sexo === 'f' ?
                $data['photo'] = asset('/files/avatars/avatar-mulher.jpg') :
                $data['photo'] = asset('/files/avatars/avatar-homem.jpg'));


        $data['uploads'] = Upload::query()
            ->where('type','=', '1')
            ->where('type_id', '=', $client->id)
            ->get();

        //RETORNA OS DADOS
        return $data;
    }

    //FUNÇÃO PARA EXCLUIR
    public function delete(Client $client)
    {

        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $client->delete();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

    }

    //FUNÇÃO PARA LOGS
    public function logs(Request $request)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $this->logsClientsRepository->add($request);

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

    }

    //FUNÇÃO PARA LOGS
    public function transfer(TransferFormRequest $request)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $client = Client::where('id', $request->client_id)->first();
        $client->unidade_id = $request->unidade_id;
        $client->transferido = 's';
        $client->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

    }

    //FUNÇÃO PARA UPLOADS
    public function upload(Request $request)
    {
        //VALIDAÇÃO
        $request->validate([
           'nomeupload' => ['required'],
           'archives' => ['required']
        ],[
            'nomeupload.required' => 'O nome do arquivo é obrigatório',
            'archives.required' => 'O arquivo é obrigatório'
        ]);

        //UPLOAD VIA REPOSITORY
        $this->uploadsRepository->add(1,$request->client_id,$request->archives, $request->nomeupload);
    }

    //FUNÇÃO PARA UPLOADS
    public function password(Request $request)
    {
        $data = $request->except('_token');
        //VALIDAÇÃO
        $request->validate([
            'password' => ['required','min:8'],
            'confirm-password' => ['required']
        ],[
            'password.required' => 'A Nova senha é obrigatório',
            'password.min' => 'A senha deve conter no minimo 8 caracteres.',
            'confirm-password.required' => 'Confirmar senha é obrigatório',
        ]);

        if ($data['password'] != $data['confirm-password']) {
            session()->flash('confirmpass', 'As senhas não conferem');
            return redirect()->back();
        }

        //ALERT
        Alert::success('Concluido', 'Senha alterada com sucesso!');

        $client = Client::where('id', $request->client_id)->first();
        $client->senha = Hash::make($data['password']);
        $client->save();

        return true;

    }

    //FUNÇÃO PARA MIGRAR
    public function migration()
    {
        //FUNÇÃO PARA PODER SETAR O ID
        Client::unguard();

        //OBTEM OS DADOS
        $api = Http::get('https://unidade.espacoicelaser.com/migracao/clientes');

        $total = 0;
        $att = 0;
        $add = 0;
        $un = 0;

        //ADD OS DADOS
        foreach ($api->json() as $unidade) {
            $total += count($unidade);

            foreach ($unidade as $user) {

                //OBTEM PARA VERIFICAÇÃO
                $get = Client::where('id', $user['id'])->withTrashed()->first();

                if ($get) {

                    $user['created_at'] = $user['dataCadastro'];
                    $user['updated_at'] = $user['dataAtualizacao'];
                    $user['unidade_id'] = $user['unidade'];
                    $user['deleted_at'] = $user['ativo'] == 'n' ? date('Y-m-d H:i:s') : null;
                    $user['cpf'] = preg_replace('/[^0-9]/', '', $user['cpf']);
                    unset($user['unidade'],$user['info'],$user['dataCadastro'],$user['dataAtualizacao']);
                    $get->fill($user);
                    $get->save();
                    $att++;

                } else {

                    Client::create([
                        'id' => $user['id'],
                        'nome' => $user['nome'],
                        'sexo' => $user['sexo'],
                        'estado_civil' => $user['estado_civil'],
                        'dataNascimento' => $user['dataNascimento'],
                        'cpf' => preg_replace('/[^0-9]/', '', $user['cpf']),
                        'rg' => $user['rg'],
                        'endereco' => $user['endereco'],
                        'cep' => $user['cep'],
                        'bairro' => $user['bairro'],
                        'cidade' => $user['cidade'],
                        'numero' => $user['numero'],
                        'whatsapp' => $user['whatsapp'],
                        'email' => $user['email'],
                        'senha' => $user['senha'],
                        'unidade_id' => $user['unidade'],
                        'transferido' => $user['transferido'],
                        'diabetes' => $user['diabetes'],
                        'cardiaco' => $user['cardiaco'],
                        'hormonal' => $user['hormonal'],
                        'foliculite' => $user['foliculite'],
                        'foliculite_onde' => $user['foliculite_onde'],
                        'doenca_de_pele' => $user['doenca_de_pele'],
                        'doenca_de_pele_qual' => $user['doenca_de_pele_qual'],
                        'fotossensiveis' => $user['fotossensiveis'],
                        'fotossensiveis_qual' => $user['fotossensiveis_qual'],
                        'queloides' => $user['queloides'],
                        'queloides_qual' => $user['queloides_qual'],
                        'alergico' => $user['alergico'],
                        'alergico_qual' => $user['alergico_qual'],
                        'herpes' => $user['herpes'],
                        'herpes_frequencias' => $user['herpes_frequencias'],
                        'epilepsia' => $user['epilepsia'],
                        'epilepsia_frequencias' => $user['epilepsia_frequencias'],
                        'neoplasias_metastases' => $user['neoplasias_metastases'],
                        'neopla_metast_qual' => $user['neopla_metast_qual'],
                        'medicamentos' => $user['medicamentos'],
                        'medicamentos_qual' => $user['medicamentos_qual'],
                        'doenca_autoimune' => $user['doenca_autoimune'],
                        'doenca_autoimune_qual' => $user['doenca_autoimune_qual'],
                        'gestante' => $user['gestante'],
                        'gestante_meses' => $user['gestante_meses'],
                        'lactante' => $user['lactante'],
                        'lactante_tempo' => $user['lactante_tempo'],
                        'tratamento' => $user['tratamento'],
                        'tratamento_qual' => $user['tratamento_qual'],
                        'pelos_brancos_loiros_ruivos' => $user['pelos_brancos_loiros_ruivos'],
                        'exposicao_sol' => $user['exposicao_sol'],
                        'exposicao_sol_frequencia' => $user['exposicao_sol_frequencia'],
                        'filtro_solar' => $user['filtro_solar'],
                        'roacutan' => $user['roacutan'],
                        'roacutan_qual' => $user['roacutan_qual'],
                        'medic_fotossensiveis' => $user['medic_fotossensiveis'],
                        'medic_fotossensiveis_qual' => $user['medic_fotossensiveis_qual'],
                        'anabolizante' => $user['anabolizante'],
                        'anabolizante_qual' => $user['anabolizante_qual'],
                        'acidos' => $user['acidos'],
                        'acidos_tempo' => $user['acidos_tempo'],
                        'laser' => $user['laser'],
                        'laser_qual' => $user['laser_qual'],
                        'tatuagem_micropig' => $user['tatuagem_micropig'],
                        'tatuagem_micropig_onde' => $user['tatuagem_micropig_onde'],
                        'reacoes' => $user['reacoes'],
                        'reacoes_qual' => $user['reacoes_qual'],
                        'ativo' => $user['ativo'],
                        'created_at' => $user['dataCadastro'],
                        'updated_at' => $user['dataAtualizacao'],
                        'deleted_at' => $user['ativo'] == 'n' ? date('Y-m-d H:i:s') : null
                    ]);

                    $add++;

                }
            }

            $un++;
            echo 'Unidade: ' . $un . ' 100%<br>';
        }
        echo '<br><br>';
        echo 'Total: ' . $total . '<br>';
        echo 'Atualizados: ' . $att . '<br>';
        echo 'Cadastrados: ' . $add . '<br>';
        echo 'Unidades: ' . $un . '<br>';

    }
}
