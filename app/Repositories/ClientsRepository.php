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
    public function edit(Request $request,Client $clients);

    //SHOW
    public function show(Client $clients);

    //EXCLUIR
    public function delete(Client $clients);

    //LOG
    public function logs(Request $request);

    //TRANSFERE
    public function transfer(Request $request);

    //MIGRAR
    public function migration();
}
