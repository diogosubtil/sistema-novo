<?php

namespace App\Repositories;

use App\Http\Requests\SupportsFormRequest;
use App\Models\Support;
use Illuminate\Http\Request;

interface SupportsRepository
{
    //INDEX
    public function index(Request $request): array;

    //INDEX USER
    public function indexUser(): array;

    //CREATE
    public function create(): array;

    //CREATE
    public function show(Support $support): array;

    //ADICIONA SUPORTE
    public function add(SupportsFormRequest $request): Support;

    //EDITA SUPORTE
    public function edit(SupportsFormRequest $request,Support $support);

    //DESATIVA SUPORTE
    public function disable(Support $support);

    //ATIVA SUPORTE
    public function enable(Support $support);
}
