<?php

namespace App\Repositories;

use App\Http\Requests\SupportsAnswersFormRequest;
use App\Models\Support;
use App\Models\SupportAnswer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EloquentSupportsAnswersRepository implements SupportsAnswersRepository
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private UploadsRepository $repository,private NotificationsRepository $notificationsRepository)
    {
    }

    //FUNÇÂO PARA CADASTRAR NO BANCO
    public function add(SupportsAnswersFormRequest $request): SupportAnswer
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O CADASTRO
        $data = $request->except('_token');
        $supportAnswer = SupportAnswer::create($data);

        //UPLOAD DOS ARQUIVOS
        if ($request->file){
            $this->repository->add(5, $supportAnswer->id, $request->file, $supportAnswer->id);
        }

        //OBTEM O SUPORTE E VERIFICA O USUARIO PARA DEFINIR O STATUS DO SUPORTE E NOTIFICA
        $support = Support::query()->where('id', '=', $supportAnswer->support_id)->first();
        if (Auth::user()->funcao == 1) {
            //ALTERA O STATUS
            $status['status'] = 3;

            //CADASTRA A NOTIFICAÇÃO PARA O USUARIO QUE CRIOU O SUPORTE
            $data = [
                'title'     => 'Nova Resposta - Ticket de Suporte',
                'content'   => 'O Administrador ' . Auth::user()->name . ' respondeu o suporte #' . $support->id . '.',
                'url'       => '/supports/ticket/' . $support->id,
                'type'      => 'Suporte',
                'color'     => 'primary',
                'date'      => date('d/m/Y H:i')
            ];
            $this->notificationsRepository->add('Support','User',$support->user, $data);

        } else {
            //ALTERA O STATUS
            $status['status'] = 2;

            //CADASTRA A NOTIFICAÇÃO PARA OS ADMINS
            $admins = User::query()->where('funcao', '=', 1)->get();
            foreach ($admins as $admin){
                $data = [
                    'title'     => 'Nova Resposta - Ticket de Suporte',
                    'content'   => 'O usuário ' . Auth::user()->name . ' respondeu o suporte #' . $support->id . '.',
                    'url'       => '/supports/' . $support->id,
                    'type'      => 'Suporte',
                    'color'     => 'primary',
                    'date'      => date('d/m/Y H:i')
                ];
                $this->notificationsRepository->add('Support','User',$admin->id, $data);
            }
        }
        $support->fill($status);
        $support->save();



        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        //RETORNA A UNIDADE CRIADA
        return $supportAnswer;
    }
}
