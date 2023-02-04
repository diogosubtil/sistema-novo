<?php

namespace App\Repositories;

use App\Http\Requests\UsersFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class UsersRepository
{
    //FUNÇÂO PARA CADASTRAR NO BANCO
    public function add(UsersFormRequest $request): User
    {
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
    public function active(User $user)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $user->ativo = 's';
        $user->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();
    }
}
