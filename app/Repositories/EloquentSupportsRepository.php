<?php

namespace App\Repositories;

use App\Http\Requests\SupportsFormRequest;
use App\Models\Support;
use App\Models\Unidade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EloquentSupportsRepository implements SupportsRepository
{

    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private UploadsRepository $repository, private NotificationsRepository $notificationsRepository)
    {
    }

    //FUNÇÃO PARA OBTER DADOS PARA O INDEX
    public function index(Request $request): array
    {
        //OBTEM OS USUARIOS
        $data['users'] = User::all();
        //OBTEM AS UNIDADE
        $data['unidades'] = Unidade::query()
            ->where('ativo', '=', 's')->get();

        //OBTEM OS SUPORTES
        $data['supports'] = Support::query()
            ->where('ativo', '=', 's')
            ->orderBy('status')
            ->orderBy('updated_at')
            ->filter($request->all());

        //OBTEM DADOS PARA CALCULOS
        $data['totals'] = Support::query()
            ->where('ativo', '=', 's')->get();
        $data['concluidos'] = 0;
        $data['pendentes'] = 0;
        foreach ($data['totals'] as $total){
            if ($total->status == 4){
                $data['concluidos']++;
            } else {
                $data['pendentes']++;
            }
        }

        return $data;
    }

    //FUNÇÂO PARA CADASTRAR NO BANCO
    public function add(SupportsFormRequest $request): Support
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O CADASTRO
        $data = $request->except('_token');
        $supporte = Support::create($data);

        //UPLOAD DOS ARQUIVOS
        if ($request->file){
            $this->repository->add(20,$supporte->id,$request->file);
        }

        //CADASTRA A NOTIFICAÇÃO PARA OS ADMINS
        $admins = User::query()->where('funcao', '=', 1)->get();
        foreach ($admins as $admin){
            $data = [
                'title'     => 'Novo Ticket de Suporte',
                'content'   => 'O usuário '.Auth::user()->name.' adicionou um novo suporte.',
                'url'       => '/supports/'.$supporte->id,
                'type'      => 'Suporte',
                'color'     => 'primary',
                'date'      => date('d/m/Y H:i')
            ];
            $this->notificationsRepository->add('Support','User',$admin->id, $data);
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
