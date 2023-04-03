<?php

namespace App\Repositories;

use App\Http\Requests\UnidadesFormRequest;
use App\Models\Unidade;
use Illuminate\Http\Request;

interface UnidadesRepository
{
    //INDEX
    public function index(): array;

    //ADICIONA UNIDADE
    public function add(UnidadesFormRequest $request): Unidade;

    //EDITA UNIDADE
    public function edit(UnidadesFormRequest $request,Unidade $unidade);

    //DESATIVA UNIDADE
    public function disable(Unidade $unidade);

    //ATIVA UNIDADE
    public function enable(Unidade $unidade);

    //EXCLUIR UNIDADE
    public function delete(Unidade $unidade);
}
