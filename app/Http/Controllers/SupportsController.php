<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportsFormRequest;
use App\Models\Support;
use App\Models\SupportAnswer;
use App\Models\Unidade;
use App\Models\Upload;
use App\Models\User;
use App\Repositories\SupportsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SupportsController extends Controller
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private SupportsRepository $repository)
    {
    }

    //FUNÇÃO PARA EXIBIR A VIEW (PAINEL)
    public function index(Request $request)
    {
        //OBTEM OS DADOS VIA REPOSITORY
        $data = $this->repository->index($request);

        //RETORNA A VIEW COM OS DADOS
        return view('supports.index')
            ->with('supports', $data['supports']->paginate(15))
            ->with('users', $data['users'])
            ->with('concluidos', $data['concluidos'])
            ->with('pendentes', $data['pendentes'])
            ->with('unidades', $data['unidades']);
    }

    //FUNÇÃO PARA EXIBIR A VIEW (SUPORT USER)
    public function indexUser()
    {
        //OBTEM OS SUPORTES
        $supports = Support::query()
            ->where('ativo', '=', 's')
            ->where('user', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->orderBy('updated_at')->paginate(10);

        //OBTEM A HORARIO DE ATENDIMENTO
        $atendInicio = strtotime(date('Y-m-d 09:00:00'));
        $atendFim = strtotime(date('Y-m-d 22:00:00'));
        $agora = time();
        // Verifica horas
        if ($atendInicio <= $agora && $agora <= $atendFim) {
            $disponibilidade = 'diponíveis';
        } else {
            $disponibilidade = 'indisponível';
        }

        //OBTEM O ULTIMO SUPORTE
        $ultimoSuporte = Support::query()
            ->where('ativo', '=', 's')
            ->where('user', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->first();

        //RETORNA A VIEW COM OS DADOS
        return view('supports.index-user')
            ->with('supports', $supports)
            ->with('atendInicio', $atendInicio)
            ->with('atendFim', $atendFim)
            ->with('disponibilidade', $disponibilidade)
            ->with('ultimoSuporte', $ultimoSuporte);
    }

    //FUNÇÃO PARA EXIBIR A VIEW (CREATE)
    public function create()
    {

        //OBTEM A HORARIO DE ATENDIMENTO
        $atendInicio = strtotime(date('Y-m-d 09:00:00'));
        $atendFim = strtotime(date('Y-m-d 22:00:00'));
        $agora = time();
        // Verifica horas
        if ($atendInicio <= $agora && $agora <= $atendFim) {
            $disponibilidade = 'diponíveis';
        } else {
            $disponibilidade = 'indisponível';
        }

        //OBTEM O ULTIMO SUPORTE
        $ultimoSuporte = Support::query()
            ->where('ativo', '=', 's')
            ->where('user', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->first();

        return view('supports.create')
            ->with('atendInicio', $atendInicio)
            ->with('atendFim', $atendFim)
            ->with('disponibilidade', $disponibilidade)
            ->with('ultimoSuporte', $ultimoSuporte);
    }

    //FUNÇÃO PARA CADASTRAR NO BANCO
    public function store(SupportsFormRequest $request)
    {
        //ADICIONA NO BANCO VIA REPOSITORY
        $support = $this->repository->add($request);

        //ALERT
        Alert::success('Concluido', 'Ticket aberto com sucesso!');

        //RETORNA A VIEW
        //return to_route('supports.indexuser', Auth::user()->id);

        return $support;
    }

    //FUNÇÃO PARA EXIBIR A VIEW (SHOW)
    public function show(Support $support)
    {

        //OBTEM OS UPLOADS DO SUPORTE
        $uploads = Upload::query()
            ->where('type', '=', 20)
            ->where('type_id', '=', $support->id)
            ->get();

        //OBTEM AS REPOSTAS E UPLOADS
        $answersAndUp = [];
        foreach ($support->answers as $answer){
            $upAnswers = Upload::query()
                ->where('type', '=', 21)
                ->where('type_id', '=', $answer->id)
                ->get();
            $answersAndUp[] = ['answer' => $answer, 'uploads' => $upAnswers];
        }

        //RETORNA A VIEW
        return view('supports.show', $support)
            ->with('support', $support)
            ->with('answersAndUp', $answersAndUp)
            ->with('uploads', $uploads);
    }

    //FUNÇÃO PARA EXIBIR A VIEW (SHOW-USER)
    public function showUser(Support $support)
    {

        //OBTEM OS UPLOADS DO SUPORTE
        $uploads = Upload::query()
            ->where('type', '=', 20)
            ->where('type_id', '=', $support->id)
            ->get();

        //OBTEM AS REPOSTAS E UPLOADS
        $answersAndUp = [];
        foreach ($support->answers as $answer){
            $upAnswers = Upload::query()
                ->where('type', '=', 21)
                ->where('type_id', '=', $answer->id)
                ->get();
            $answersAndUp[] = ['answer' => $answer, 'uploads' => $upAnswers];
        }

        //RETORNA A VIEW
        return view('supports.show-user', $support)
            ->with('support', $support)
            ->with('answersAndUp', $answersAndUp)
            ->with('uploads', $uploads);
    }

    //FUNÇÃO PARA FAZER UPDATE NO BANCO
    public function update(SupportsFormRequest $request, Support $support)
    {
        //UPDATE NO BANCO VIA REPOSITORY
        $this->repository->edit($request, $support);

        Alert::success('Concluido', 'Ticket Finalizado com sucesso!');

        if (Auth::user()->funcao == 1){
            $rota = to_route('supports.index');
        } else {
            $rota = to_route('supports.indexuser');

        }
        return $rota;
    }

}
