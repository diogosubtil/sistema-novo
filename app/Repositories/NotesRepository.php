<?php

namespace App\Repositories;

use App\Http\Requests\ClientsFormRequest;
use App\Http\Requests\NotesFormRequest;
use App\Models\Note;
use Illuminate\Http\Request;

interface NotesRepository
{
    //ADICIONA
    public function add(NotesFormRequest $request): Note;

    //EDITA
    public function edit(NotesFormRequest $request,Note $note);

    //EXCLUIR
    public function delete(Note $note);

    //MIGRAR
    public function migration();
}
