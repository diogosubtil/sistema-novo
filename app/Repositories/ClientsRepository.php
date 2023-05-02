<?php

namespace App\Repositories;

use App\Http\Requests\ClientsFormRequest;
use App\Models\Clients;
use Illuminate\Http\Request;

interface ClientsRepository
{
    //INDEX
    public function index(Request $request): array;

    //ADICIONA UNIDADE
    public function add(ClientsFormRequest $request): Clients;

    //EDITA UNIDADE
    public function edit(ClientsFormRequest $request,Clients $clients);

    //DESATIVA UNIDADE
    public function disable(Clients $clients);

    //ATIVA UNIDADE
    public function enable(Clients $clients);

    //EXCLUIR UNIDADE
    public function delete(Clients $clients);

    //MIGRAR
    public function migration();
}
