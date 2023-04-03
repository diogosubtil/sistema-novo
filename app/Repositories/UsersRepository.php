<?php

namespace App\Repositories;

use App\Http\Requests\UsersFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

interface UsersRepository
{
    //INDEX
    public function index(Request $request): array;

    //ADICIONA USUARIO
    public function add(UsersFormRequest $request): User;

    //EDITA USUARIO
    public function edit(Request $request,User $user);

    //DESATIVA USUARIO
    public function disable(User $user);

    //ATIVA USUARIO
    public function enable(User $user);

    //EXCLUIR USUARIO
    public function delete(User $user);
}
