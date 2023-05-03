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

    //SHOW
    public function show(Support $support): array;

    //ADICIONA
    public function add(SupportsFormRequest $request): Support;

    //EDITA
    public function edit(SupportsFormRequest $request,Support $support);

    //DESATIVA
    public function disable(Support $support);

    //ATIVA
    public function enable(Support $support);
}
