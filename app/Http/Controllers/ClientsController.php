<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientsFormRequest;
use App\Http\Requests\UsersFormRequest;
use App\Models\Client;
use App\Models\Unidade;
use App\Models\User;
use App\Repositories\ClientsRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClientsController extends Controller
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private ClientsRepository $repository)
    {
    }

    //FUNÇÃO PARA EXIBIR A VIEW (PAINEL)
    public function index(Request $request)
    {
        //OBTEM DADOS VIA REPOSITORY
        $data = $this->repository->index($request);

        //RETORNA A VIEW COM OS DADOS
        return view('clients.index')
            ->with('clients', $data['clients']->paginate('15'))
            ->with('masculino', $data['masculino'])
            ->with('femininos', $data['femininos'])
            ->with('total', $data['clients']);
    }

    //FUNÇÃO PARA EXIBIR A VIEW (CADASTRAR)
    public function create()
    {
        //RETORNA A VIEW COM OS DADOS
        return view('clients.create');
    }

    //FUNÇÃO PARA CADASTRAR NO BANCO
    public function store(ClientsFormRequest $request)
    {
        //ADICIONA NO BANCO VIA REPOSITORY
        $client = $this->repository->add($request);

        //ALERT
        Alert::success('Concluido', 'Cliente ' . $client->name .  ' cadastrado com sucesso!');

        //RETORNA A VIEW
        return to_route('clients.index');
    }

    //FUNÇÃO PARA EXIBIR A VIEW (EDITAR)
    public function edit(Client $client)
    {
        //RETORNA A VIEW COM OS DADOS
        return view('clients.edit')
            ->with('client', $client);
    }

    //FUNÇÃO PARA FAZER UPDATE NO USUARIO
    public function update(Request $request, Client $client)
    {

        //EDITA NO BANCO VIA REPOSITORY
        $this->repository->edit($request, $client);

        //ALERT
        Alert::success('Concluido', 'Cliente editado com sucesso!');

        //RETORNA A VIEW
        return to_route('clients.index');
    }

    //FUNÇÃO PARA EXCLUIR USUARIO
    public function destroy(Client $client)
    {
        //ATIVA USUARIO VIA REPOSITORY
        $this->repository->delete($client);

        //ALERT
        Alert::success('Concluido', 'Cliente excluido com sucesso!');

        //RETORNA A VIEW
        return to_route('clients.index');
    }

    //FUNÇÃO PARA MIGRAR
    public function migrate()
    {
        //OBTEM VIA REPOSITORY
        $this->repository->migration();
    }

}
