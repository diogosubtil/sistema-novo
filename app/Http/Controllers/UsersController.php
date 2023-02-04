<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersFormRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\UsersRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    public function __construct(private UsersRepository $repository)
    {
    }

    //FUNÇÃO PARA EXIBIR A VIEW (PAINEL)
    public function index()
    {
        $usuarios = User::query()->orderBy('name')->paginate(15);
        $total = User::all();

        //OBTEM ATIVOS,DESATIVADOS,ONLINE
        $ativos = 0;
        $desativados = 0;
        $online = [];
        foreach ($total as $users){
            if ($users->ativo == 's'){
                $ativos++;
            }
            if ($users->ativo == 'n'){
                $desativados++;
            }
            if ($users->last_seen != null){
                $online[] = $users;
            }
        }

        //RETORNA PARA A PAGINA
        return view('users.index')
            ->with('usuarios', $usuarios)
            ->with('total', $total)
            ->with('ativos', $ativos)
            ->with('desativados', $desativados)
            ->with('online', $online);
    }

    //FUNÇÃO PARA EXIBIR A VIEW (CADASTRAR)
    public function create()
    {
        return view('users.create');
    }

    //FUNÇÃO PARA CADASTRAR NO BANCO
    public function store(UsersFormRequest $request, UsersRepository $repository)
    {
        //ADICIONA NO BANCO VIA REPOSITORY
        $user = $this->repository->add($request);

        Alert::success('Concluido', 'Usuario ' . $user->name .  ' cadastrado com sucesso!');

        return to_route('users.index');
    }

    //FUNÇÃO PARA EXIBIR A VIEW (EDITAR)
    public function edit(User $user)
    {
        $unidades = explode(',' , $user->unidade);
        return view('users.edit')
            ->with('user', $user)
            ->with('unidades', $unidades);
    }

    //FUNÇÃO PARA FAZER UPDATE NO USUARIO
    public function update(Request $request, User $user)
    {
        //EDITA NO BANCO VIA REPOSITORY
        $this->repository->edit($request, $user);

        Alert::success('Concluido', 'Usuario ' . $user->name . ' editado com sucesso!');

        return to_route('users.index');
    }

    //FUNÇÃO PARA DESATIVAR USUARIO
    public function deactivate(User $user)
    {
        //DESABILITA USUARIO VIA REPOSITORY
        $this->repository->disable($user);

        Alert::success('Concluido', 'Usuario desativado com sucesso!');

        return to_route('users.index');
    }

    //FUNÇÃO PARA ATIVAR USUARIO
    public function activate(User $user)
    {
        //ATIVA USUARIO VIA REPOSITORY
        $this->repository->active($user);

        Alert::success('Concluido', 'Usuario ativado com sucesso!');

        return to_route('users.index');
    }


}
