<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Repositories\NotificationsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function __construct(private NotificationsRepository $repository)
    {

    }
    //FUNÇÃO PARA OBTER AS NOTIFICAÇÕES
    public function get(Request $request)
    {
        //OBTEM OS DADOS VIA REPOSITORY
        return json_encode($this->repository->get($request));
    }

    //FUNÇÃO PARA OBTER A QUANTIDADE DE NOTIFICAÇÕES NOVAS
    public function quantity()
    {
        //OBTEM OS DADOS VIA REPOSITORY
        return $this->repository->quantity();
    }

    //FUNÇÃO PARA MARCA COMO LIDA AS NOTIFICAÇÕES
    public function seen()
    {
        //OBTEM OS DADOS VIA REPOSITORY
        return $this->repository->seen();
    }
}
