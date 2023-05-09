<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Repositories\UploadsRepository;
use RealRashid\SweetAlert\Facades\Alert;

class UploadsController extends Controller
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private UploadsRepository $repository)
    {
    }

    //FUNÇÃO PARA EXCLUIR UNIDADE
    public function destroy(Upload $upload)
    {
        //EXCLUI A UNIDADE VIA REPOSITORY
        $this->repository->delete($upload);

        //ALERT
        Alert::success('Concluido', 'Arquivo excluido com sucesso!');

        //RETORNA A VIEW
        return redirect()->back();
    }
}
