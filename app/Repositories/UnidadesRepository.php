<?php

namespace App\Repositories;

use App\Http\Requests\UnidadesFormRequest;
use App\Models\Unidade;
use Illuminate\Http\Request;

interface UnidadesRepository
{
    //INDEX
    public function index(): array;

    //ADICIONA USUARIO
    public function add(UnidadesFormRequest $request): Unidade;

    //EDITA USUARIO
    public function edit(UnidadesFormRequest $request,Unidade $unidade);

    //DESATIVA USUARIO
    public function disable(Unidade $unidade);

    //ATIVA USUARIO
    public function enable(Unidade $unidade);
}
