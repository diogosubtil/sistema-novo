<?php

namespace App\Repositories;

use App\Http\Requests\UsersFormRequest;
use App\Models\Register;
use App\Models\Unidade;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;

class EloquentUsersRepository implements UsersRepository
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private RegistersRepository $repository)
    {
    }

    //FUNÇÃO PARA OBTER DADOS PARA O INDEX
    public function index(Request $request): array
    {
        //OBTEM TODOS OS USUARIOS COM PAGINAÇÃO
        $data['usuarios'] = User::query()->orderBy('name')
            ->filter($request->all())->paginate('15');

        $data['unidades'] = Unidade::query()->where('ativo', '=', 's')->get();

        //OBTEM USUARIOS PARA CONTAGEM E ONLINE
        $data['total'] = User::all();

        //OBTEM ATIVOS,DESATIVADOS,ONLINE
        $data['ativos'] = 0;
        $data['desativados'] = 0;
        $data['online'] = [];
        foreach ($data['total'] as $users){
            if ($users->ativo == 's'){
                $data['ativos']++;
            }
            if ($users->ativo == 'n'){
                $data['desativados']++;
            }
        }

        return $data;
    }

    //FUNÇÂO PARA CADASTRAR NO BANCO
    public function add(UsersFormRequest $request): User
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O CADASTRO
        $data = $request->except('_token');
        $data['unidade_id'] = implode(',', $data['unidade_id']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        //SALVA O REGISTRO
        $this->repository->add($user->id,'c','User');

        //ENVIA O EMAIL DE VERIFICAÇÃO
        $user->sendEmailVerificationNotification();

        return $user;
    }

    //FUNÇÃO PARA UPDATE NO BANCO
    public function edit(Request $request, User $user)
    {
        //VALIDAÇÃO DA SENHA
        if ($request->password){
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        //VALIDAÇÃO EMAIL
        if ($request->email != $user->email){
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            ]);
        }

        //VALIDAÇÕES
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'funcao' => ['required', 'integer', 'max:255'],
            'telefone' => ['required', 'string'],
            'unidade_id' => ['required'],
            'treinamento' => ['required', 'string', 'max:255'],
        ]);

        //OBTEM DADOS ANTES DAS ALTERAÇÔES PARA REGISTRO
        $dataOld = $user->getOriginal();

        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //VALIDAÇÃO E-MAIL
        if ($request->email != $user->email){
            $user->email_verified_at = null;
        }

        //OBTEM OS DADOS DO REQUEST E FAZ O UPDATE
        $data = $request->except('_token');
        $data['unidade_id'] = implode(',', $data['unidade_id']);

        //VALIDAÇÃO PARA REDEFINIR SENHA
        if ($request->password){
            $data['password'] = Hash::make($request->password);
        } else {
            $data['password'] = $user->password;
        }

        $user->fill($data);
        $user->save();

        //OBTEM DADOS ANTES DAS ALTERAÇÔES PARA REGISTRO
        $dataNew = $user->getChanges();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        //VERIFICA SE HOUVE ALTERAÇÃO E SALVA O REGISTRO
        if ($dataNew){
            $this->repository->add($user->id,'e','User', $dataNew, $dataOld);
        }
    }

    //FUNÇÃO PARA DESATIVAR USUARIO
    public function disable(User $user)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $user->ativo = 'n';
        $user->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();
    }

    //FUNÇÃO PARA ATIVAR USUARIO
    public function enable(User $user)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $user->ativo = 's';
        $user->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();
    }

    //FUNÇÃO PARA EXCLUIR USUARIO
    public function delete(User $user)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $user->delete();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();
    }

    //FUNÇÃO PARA MIGRAR
    public function migration()
    {
        //FUNÇÃO PARA PODER SETAR O ID
        User::unguard();

        //OBTEM OS DADOS
        $api = Http::get('https://unidade.espacoicelaser.com/migracao/usuarios');

        $total = count($api->json());
        $att = 0;
        $add = 0;

        //ADD OS DADOS
        foreach ($api->json() as $user) {

            //OBTEM PARA VERIFICAÇÃO
            $get = User::where('id', $user['id'])->withTrashed()->first();

            if ($get) {

                $get->name = $user['nome'];
                $get->email = $user['email'];
                $get->password = $user['senha'];
                $get->telefone = $user['telefone'];
                $get->funcao = $user['funcao'];
                $get->unidade_id = $user['unidade'];
                $get->treinamento = $user['treinamento'];
                $get->ativo = $user['ativo'];
                $get->created_at = $user['dataCadastro'];
                $get->updated_at = $user['dataAtualizacao'];
                $get->save();

                $att++;

            } else {

                User::create([
                    'id' => $user['id'],
                    'name' => $user['nome'],
                    'email' => $user['email'],
                    'password' => $user['senha'],
                    'telefone' => $user['telefone'],
                    'funcao' => $user['funcao'],
                    'unidade_id' => $user['unidade'],
                    'treinamento' => $user['treinamento'],
                    'ativo' => $user['ativo'],
                    'created_at' => $user['dataCadastro'],
                    'updated_at' => $user['dataAtualizacao'],
                ]);

                $add++;

            }

        }

        echo 'Total: ' . $total . '<br>';
        echo 'Atualizados: ' . $att . '<br>';
        echo 'Cadastrados: ' . $add . '<br>';

    }
}
