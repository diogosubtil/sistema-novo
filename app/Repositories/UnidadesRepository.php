<?php

namespace App\Repositories;

use App\Http\Requests\UnidadesFormRequest;
use App\Models\Unidade;

interface UnidadesRepository
{
    //ADICIONA USUARIO
    public function add(UnidadesFormRequest $request): Unidade;

    //EDITA USUARIO
    public function edit(UnidadesFormRequest $request,Unidade $unidade);

    //DESATIVA USUARIO
    public function disable(Unidade $unidade);

    //ATIVA USUARIO
    public function active(Unidade $unidade);
}
