<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportsAnswersFormRequest;
use App\Repositories\SupportsAnswersRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupportsAnswersController extends Controller
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private SupportsAnswersRepository $repository)
    {
    }

    public function store(SupportsAnswersFormRequest $request)
    {
        //ADICIONA NO BANCO VIA REPOSITORY
        $this->repository->add($request);

        //ALERT
        Alert::success('Concluido', 'Ticket respondido com sucesso!');

        //RETORNA A VIEW
        //return to_route('supports.show', $request->support_id);

        return true;
    }

    public function storeUser(SupportsAnswersFormRequest $request)
    {
        //ADICIONA NO BANCO VIA REPOSITORY
        $this->repository->add($request);

        //ALERT
        Alert::success('Concluido', 'Ticket respondido com sucesso!');

        //RETORNA A VIEW
        //return to_route('supports.showuser', $request->support_id);

        return true;
    }
}
