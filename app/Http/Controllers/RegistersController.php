<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\Unidade;
use App\Models\User;
use App\Repositories\RegistersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegistersController extends Controller
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private RegistersRepository $repository)
    {
    }

    //FUNÇÃO PARA EXIBIR A VIEW (PAINEL)
    public function index(Request $request)
    {
        //OBTEM OS DADOS VIA REPOSITORY
        $data = $this->repository->index($request);

        return view('registers.index')
            ->with('users', $data['users'])
            ->with('unidades', $data['unidades'])
            ->with('registers',$data['registers']->paginate(15));

    }
}
