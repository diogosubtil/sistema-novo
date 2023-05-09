<?php

namespace App\Repositories;

use App\Helpers\Helper;
use App\Http\Requests\NotesFormRequest;
use App\Http\Requests\UsersFormRequest;
use App\Models\Client;
use App\Models\LogClient;
use App\Models\Note;
use App\Models\Register;
use App\Models\Unidade;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;

class EloquentNotesRepository implements NotesRepository
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct()
    {
    }

    //FUNÇÂO PARA CADASTRAR NO BANCO
    public function add(NotesFormRequest $request): Note
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $data = $request->except('_token');
        $note = Note::create($data);

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        return $note;
    }

    //FUNÇÂO PARA EDITAR NO BANCO
    public function edit(NotesFormRequest $request, Note $note)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $data = $request->except('_token');
        $note->fill($data);
        $note->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

    }

    //FUNÇÂO PARA DELETAR DO BANCO
    public function delete(Note $note)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $note->delete();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

    }

    //FUNÇÃO PARA MIGRAR
    public function migration()
    {
        //FUNÇÃO PARA PODER SETAR O ID
        Note::unguard();

        //OBTEM OS DADOS
        $api = Http::get('https://unidade.espacoicelaser.com/migracao/clientes-notas');
        $total = count($api->json());
        $att = 0;
        $add = 0;

        //ADD OS DADOS
        foreach ($api->json() as $api) {

            //OBTEM PARA VERIFICAÇÃO
            $get = Note::where('id', $api['id'])->withTrashed()->first();

            $tipoAgendamento = '';


            if ($get) {

                $get->id = $api['id'];
                $get->client_id = $api['cliente'];
                $get->scheduling = $api['agendamento'];
                $get->type = $api['tipo'] == 'Congelamento de Contrato' ? 'contract' : 'scheduling';
                $get->startDate = $api['dataInicio'];
                $get->endDate = $api['dataTermino'];
                $api['tipoAgendamento'] == 'próximo' ?  $get->typeScheduling = 'next' : '';
                $api['tipoAgendamento'] == 'fixo' ?  $get->typeScheduling = 'fixed' : '';
                $api['tipoAgendamento'] == 'específico' ?  $get->typeScheduling = 'specific' : '';
                $get->text = $api['texto'];
                $get->created_at = $api['dataCadastro'];
                $get->deleted_at = $api['ativo'] == 'n' ? date('Y-m-d H:i:s') : null;
                $get->save();

                $att++;

            } else {

                $api['tipoAgendamento'] == 'próximo' ?  $tipoAgendamento = 'next' : '';
                $api['tipoAgendamento'] == 'fixo' ?  $tipoAgendamento = 'fixed' : '';
                $api['tipoAgendamento'] == 'específico' ?  $tipoAgendamento = 'specific' : '';

                Note::create([
                    'id' => $api['id'],
                    'client_id' => $api['cliente'],
                    'scheduling' => $api['agendamento'],
                    'type' => $api['tipo'] == 'Congelamento de Contrato' ? 'contract' : 'scheduling',
                    'startDate' => $api['dataInicio'],
                    'endDate' => $api['dataTermino'],
                    'typeScheduling' => $tipoAgendamento,
                    'text' => $api['texto'],
                    'created_at' => $api['dataCadastro'],
                    'deleted_at' => $api['ativo'] == 'n' ? date('Y-m-d H:i:s') : null
                ]);

                $add++;

            }

        }

        echo 'Total' . $total . '<br>';
        echo 'Atualizados: ' . $att . '<br>';
        echo 'Cadastrados: ' . $add . '<br>';

    }
}
