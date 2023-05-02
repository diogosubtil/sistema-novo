<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\UnidadesFormRequest;
use App\Models\Unidade;
use App\Models\User;
use App\Repositories\UnidadesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class UnidadesController extends Controller
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private UnidadesRepository $repository)
    {
    }

    //FUNÇÃO PARA EXIBIR A VIEW (PAINEL)
    public function index()
    {
        //OBTEM OS DADOS VIA REPOSITORY
        $data = $this->repository->index();

        //RETORNA A VIEW COM OS DADOS
        return view('unidades.index')
            ->with('unidades', $data['unidades'])
            ->with('total', $data['total'])
            ->with('ativos', $data['ativos'])
            ->with('desativados', $data['desativados']);
    }

    //FUNÇÃO PARA EXIBIR A VIEW (CADASTRAR)
    public function create()
    {
        //OBTEM OS USUARIOS
        $usuarios = User::query()->where('ativo', '=', 's')->get();

        //RETORNA A VIEW
        return view('unidades.create')
            ->with('timezones', Helper::timezones())
            ->with('usuarios', $usuarios);
    }

    //FUNÇÃO PARA CADASTRAR NO BANCO
    public function store(UnidadesFormRequest $request)
    {
        //ADICIONA NO BANCO VIA REPOSITORY
        $this->repository->add($request);

        //ALERT
        Alert::success('Concluido', 'Unidade cadastrada com sucesso!');

        //RETORNA A VIEW
        return to_route('unidades.index');
    }

    //FUNÇÃO PARA EXIBIR A VIEW (EDITAR)
    public function edit(Unidade $unidade)
    {
        //OBTEM OS USUARIOS
        $usuarios = User::query()->where('ativo', '=', 's')->get();

        //RETORNA A VIEW COM OS DADOS
        return view('unidades.edit')
            ->with('unidade', $unidade)
            ->with('timezones', Helper::timezones())
            ->with('usuarios', $usuarios);
    }

    //FUNÇÃO PARA FAZER UPDATE NO USUARIO
    public function update(UnidadesFormRequest $request, Unidade $unidade)
    {
        //EDITA NO BANCO VIA REPOSITORY
        $this->repository->edit($request, $unidade);

        //ALERT
        Alert::success('Concluido', 'Unidade editada com sucesso!');

        //RETORNA A VIEW
        return to_route('unidades.index');
    }

    //FUNÇÃO PARA DESATIVAR USUARIO
    public function disable(Unidade $unidade)
    {
        //DESABILITA USUARIO VIA REPOSITORY
        $this->repository->disable($unidade);

        //ALERT
        Alert::success('Concluido', 'Unidade desativada com sucesso!');

        //RETORNA A VIEW
        return to_route('unidades.index');
    }

    //FUNÇÃO PARA ATIVAR USUARIO
    public function enable(Unidade $unidade)
    {
        //ATIVA USUARIO VIA REPOSITORY
        $this->repository->enable($unidade);

        //ALERT
        Alert::success('Concluido', 'Unidade ativada com sucesso!');

        //RETORNA A VIEW
        return to_route('unidades.index');
    }

    //FUNÇÃO PARA ALTERAR UNIDADE EXIBIDA
    public function setUnidade(Request $request){

        Session::put(['unidade' => $request->unidade]);

        return redirect()->back();
    }

    //FUNÇÃO PARA EXCLUIR UNIDADE
    public function destroy(Unidade $unidade)
    {
        //EXCLUI A UNIDADE VIA REPOSITORY
        $this->repository->delete($unidade);

        //ALERT
        Alert::success('Concluido', 'Unidade excluida com sucesso!');

        //RETORNA A VIEW
        return to_route('unidades.index');
    }

    //FUNÇÃO PARA MIGRAR
    public function migrate()
    {
        //OBTEM VIA REPOSITORY
        $this->repository->migration();
    }
}
