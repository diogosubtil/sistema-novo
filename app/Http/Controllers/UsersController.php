<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersFormRequest;
use App\Models\Unidade;
use App\Models\User;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private UsersRepository $repository)
    {
    }

    //FUNÇÃO PARA EXIBIR A VIEW (PAINEL)
    public function index(Request $request)
    {
        //OBTEM DADOS VIA REPOSITORY
        $data = $this->repository->index($request);

        //RETORNA A VIEW COM OS DADOS
        return view('users.index')
            ->with($data);
    }

    //FUNÇÃO PARA EXIBIR A VIEW (CADASTRAR)
    public function create()
    {
        //OBTEM AS UNIDADES
        $unidades = Unidade::query()->where('ativo', '=', 's')->get();

        //RETORNA A VIEW COM OS DADOS
        return view('users.create')
            ->with('unidades', $unidades);
    }

    //FUNÇÃO PARA CADASTRAR NO BANCO
    public function store(UsersFormRequest $request)
    {
        //ADICIONA NO BANCO VIA REPOSITORY
        $user = $this->repository->add($request);

        //ALERT
        Alert::success('Concluido', 'Usuario ' . $user->name .  ' cadastrado com sucesso!');

        //RETORNA A VIEW
        return to_route('users.index');
    }

    //FUNÇÃO PARA EXIBIR A VIEW (EDITAR)
    public function edit(User $user)
    {
        //OBTEM AS UNIDADES DO USUARIO
        $unidadesUser = explode(',' , $user->unidade_id);

        //OBTEM AS UNIDADES
        $unidades = Unidade::query()->where('ativo', '=', 's')->get();

        //RETORNA A VIEW COM OS DADOS
        return view('users.edit')
            ->with('user', $user)
            ->with('unidades', $unidades)
            ->with('unidadesUser', $unidadesUser);
    }

    //FUNÇÃO PARA FAZER UPDATE NO USUARIO
    public function update(Request $request, User $user)
    {
        //EDITA NO BANCO VIA REPOSITORY
        $this->repository->edit($request, $user);

        //ALERT
        Alert::success('Concluido', 'Usuario ' . $user->name . ' editado com sucesso!');

        //RETORNA A VIEW
        return to_route('users.index')->header('Content-Type', 'application/javascript');
    }

    //FUNÇÃO PARA DESATIVAR USUARIO
    public function disable(User $user)
    {
        //DESABILITA USUARIO VIA REPOSITORY
        $this->repository->disable($user);

        //ALERT
        Alert::success('Concluido', 'Usuario ' . $user->name . ' desativado com sucesso!');

        //RETORNA A VIEW
        return to_route('users.index');
    }

    //FUNÇÃO PARA ATIVAR USUARIO
    public function enable(User $user)
    {
        //ATIVA USUARIO VIA REPOSITORY
        $this->repository->enable($user);

        //ALERT
        Alert::success('Concluido', 'Usuario ' . $user->name . ' ativado com sucesso!');

        //RETORNA A VIEW
        return to_route('users.index');
    }

    //FUNÇÃO PARA EXCLUIR USUARIO
    public function destroy(User $user)
    {
        //ATIVA USUARIO VIA REPOSITORY
        $this->repository->delete($user);

        //ALERT
        Alert::success('Concluido', 'Usuario ' . $user->name . ' excluido com sucesso!');

        //RETORNA A VIEW
        return to_route('users.index');
    }

    //FUNÇÃO PARA MIGRAR
    public function migrate()
    {
        //OBTEM VIA REPOSITORY
        $this->repository->migration();
    }

}
