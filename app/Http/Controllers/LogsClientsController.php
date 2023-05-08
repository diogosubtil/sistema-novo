<?php

namespace App\Http\Controllers;

use App\Repositories\LogsClientsRepository;
use Illuminate\Http\Request;

class LogsClientsController extends Controller
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private LogsClientsRepository $repository)
    {
    }

    //FUNÇÃO PARA CADASTRAR NO BANCO
    public function store(Request $request)
    {
        //ADICIONA NO BANCO VIA REPOSITORY
        $this->repository->add($request);

        return true;
    }

    //FUNÇÃO PARA MIGRAR
    public function migrate()
    {
        //OBTEM VIA REPOSITORY
        $this->repository->migration();

        return true;
    }
}
