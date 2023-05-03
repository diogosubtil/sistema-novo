<?php

namespace App\Repositories;

use App\Http\Requests\UsersFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

interface UsersRepository
{
    //INDEX
    public function index(Request $request): array;

    //ADICIONA
    public function add(UsersFormRequest $request): User;

    //EDITA
    public function edit(Request $request,User $user);

    //DESATIVA
    public function disable(User $user);

    //ATIVA
    public function enable(User $user);

    //EXCLUIR
    public function delete(User $user);

    //MIGRAR
    public function migration();
}
