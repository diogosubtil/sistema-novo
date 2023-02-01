<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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

    //FUNÇÃO PARA EXIBIR A VIEW (PAINEL)
    public function index()
    {
        $usuarios = User::query()->paginate(15);
        $total = User::all();

        $ativos = 0;
        foreach ($total as $ativo){
            if ($ativo->ativo == 's'){
                $ativos++;
            }
        }

        $desativados = 0;
        foreach ($total as $desativado){
            if ($desativado->ativo == 'n'){
                $desativados++;
            }
        }

        $online = [];
        foreach ($total as $on){
            if ($on->last_seen != null){
                $online[] = $on;
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
    public function store(Request $request)
    {
        //VALIDAÇÕES
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'funcao' => ['required', 'integer', 'max:255'],
            'telefone' => ['required', 'string'],
            'unidade' => ['required'],
            'treinamento' => ['required', 'string', 'max:255'],
        ]);

        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O CADASTRO
        $data = $request->except('_token');
        $data['unidade'] = implode(',', $data['unidade']);
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        //ENVIA O EMAIL DE CONFIRMAÇÃO
        $user->sendEmailVerificationNotification();

        Alert::success('Concluido', 'Usuario cadastrado com sucesso!');

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
        //VALIDAÇÃO DA SENHA
        if ($request->password){
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }

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
            'unidade' => ['required'],
            'treinamento' => ['required', 'string', 'max:255'],
        ]);

        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //VALIDAÇÃO E-MAIL
        if ($request->email != $user->email){
            $user->email_verified_at = null;
        }
        //OBTEM OS DADOS DO REQUEST E FAZ O UPDATE
        $data = $request->except('_token');
        $data['unidade'] = implode(',', $data['unidade']);
        $data['password'] = Hash::make($request->password);
        $user->fill($data);
        $user->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        Alert::success('Concluido', 'Usuario editado com sucesso!');

        return to_route('users.index');
    }

    //FUNÇÃO PARA DESATIVAR USUARIO
    public function deactivate(User $user)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $user->ativo = 'n';
        $user->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        Alert::success('Concluido', 'Usuario desativado com sucesso!');

        return to_route('users.index');
    }

    //FUNÇÃO PARA ATIVAR USUARIO
    public function activate(User $user)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $user->ativo = 's';
        $user->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        Alert::success('Concluido', 'Usuario ativado com sucesso!');

        return to_route('users.index');
    }


}
