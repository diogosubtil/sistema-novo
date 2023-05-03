<?php

namespace App\Repositories;

use App\Http\Requests\ClientsFormRequest;
use App\Models\Client;
use Illuminate\Http\Request;

interface ClientsRepository
{
    //INDEX
    public function index(Request $request): array;

    //ADICIONA
    public function add(ClientsFormRequest $request): Client;

    //EDITA
    public function edit(ClientsFormRequest $request,Client $clients);

    //EXCLUIR
    public function delete(Client $clients);

    //MIGRAR
    public function migration();
}
