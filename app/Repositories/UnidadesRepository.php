<?php

namespace App\Repositories;

use App\Http\Requests\UnidadesFormRequest;
use App\Models\Unidade;
use Illuminate\Http\Request;

interface UnidadesRepository
{
    //INDEX
    public function index(): array;

    //ADICIONA
    public function add(UnidadesFormRequest $request): Unidade;

    //EDITA
    public function edit(UnidadesFormRequest $request,Unidade $unidade);

    //DESATIVA
    public function disable(Unidade $unidade);

    //ATIVA
    public function enable(Unidade $unidade);

    //EXCLUIR
    public function delete(Unidade $unidade);

    //MIGRAR
    public function migration();
}
