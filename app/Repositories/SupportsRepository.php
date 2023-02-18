<?php

namespace App\Repositories;

use App\Http\Requests\SupportsFormRequest;
use App\Models\Support;

interface SupportsRepository
{
    //ADICIONA SUPORTE
    public function add(SupportsFormRequest $request): Support;

    //EDITA SUPORTE
    public function edit(SupportsFormRequest $request,Support $support);

    //DESATIVA SUPORTE
    public function disable(Support $support);

    //ATIVA SUPORTE
    public function enable(Support $support);
}
