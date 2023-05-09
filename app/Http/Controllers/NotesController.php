<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotesFormRequest;
use App\Models\Note;
use App\Repositories\NotesRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NotesController extends Controller
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private NotesRepository $repository)
    {
    }

    //FUNÇÃO PARA CADASTRAR NO BANCO
    public function store(NotesFormRequest $request)
    {
        //ADICIONA NO BANCO VIA REPOSITORY
        $this->repository->add($request);

        //ALERT
        Alert::success('Concluido', 'Nota cadastrada com sucesso!');

        return redirect()->back();
    }

    //FUNÇÃO PARA FAZER UPDATE
    public function update(NotesFormRequest $request, Note $note)
    {

        //EDITA NO BANCO VIA REPOSITORY
        $this->repository->edit($request, $note);

        //ALERT
        Alert::success('Concluido', 'Nota editada com sucesso!');

        //RETORNA A VIEW
        return redirect()->back();
    }

    //FUNÇÃO PARA EXCLUIR
    public function destroy(Note $note)
    {
        //DELETA USUARIO VIA REPOSITORY
        $this->repository->delete($note);

        //ALERT
        Alert::success('Concluido', 'Nota excluida com sucesso!');

        //RETORNA A VIEW
        return redirect()->back();
    }

    //FUNÇÃO PARA MIGRAR
    public function migrate()
    {
        //OBTEM VIA REPOSITORY
        $this->repository->migration();

    }
}
