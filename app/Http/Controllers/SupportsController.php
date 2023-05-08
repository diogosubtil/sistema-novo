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
            ->with('total', $data['total'])
            ->with('concluidos', $data['concluidos'])
            ->with('pendentes', $data['pendentes'])
            ->with('unidades', $data['unidades']);
    }

    //FUNÇÃO PARA EXIBIR A VIEW (SUPORT USER)
    public function indexUser()
    {
        //OBTEM OS DADOS VIA REPOSITORY
        $data = $this->repository->indexUser();

        //RETORNA A VIEW COM OS DADOS
        return view('supports.index-user')
            ->with('supports', $data['supports'])
            ->with('ultimoSuporte', $data['ultimoSuporte']);
    }

    //FUNÇÃO PARA EXIBIR A VIEW (CREATE)
    public function create()
    {
        //OBTEM OS DADOS VIA REPOSITORY
        $data = $this->repository->create();

        //RETORNA A VIEW COM OS DADOS
        return view('supports.create')
            ->with('ultimoSuporte', $data['ultimoSuporte']);
    }

    //FUNÇÃO PARA CADASTRAR NO BANCO
    public function store(SupportsFormRequest $request)
    {
        //ADICIONA NO BANCO VIA REPOSITORY
        $support = $this->repository->add($request);

        //ALERT
        Alert::success('Concluido', 'Ticket aberto com sucesso!');

        //RETORNA O SUPORTE CRIADO
        return $support;
    }

    //FUNÇÃO PARA EXIBIR A VIEW (SHOW)
    public function show(Support $support)
    {

        //OBTEM OS DADOS VIA REPOSITORY
        $data = $this->repository->show($support);

        //RETORNA A VIEW
        return view('supports.show', $support)
            ->with('support', $support)
            ->with('answersAndUp', $data['answersAndUp'])
            ->with('uploads', $data['uploads']);
    }

    //FUNÇÃO PARA EXIBIR A VIEW (SHOW-USER)
    public function showUser(Support $support)
    {

        //OBTEM OS DADOS VIA REPOSITORY
        $data = $this->repository->show($support);

        //RETORNA A VIEW
        return view('supports.show-user', $support)
            ->with('support', $support)
            ->with('answersAndUp', $data['answersAndUp'])
            ->with('uploads', $data['uploads']);
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

    //FUNÇÃO PARA EXCLUIR
    public function destroy(Support $support)
    {
        //ATIVA USUARIO VIA REPOSITORY
        $this->repository->delete($support);

        //ALERT
        Alert::success('Concluido', 'Suporte excluido com sucesso!');

        //RETORNA A VIEW
        return to_route('supports.index');
    }

}
