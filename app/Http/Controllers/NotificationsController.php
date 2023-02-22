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
        $notifications = Notification::query()
            ->where('notifiable_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->limit($request->limit)
            ->get();

        return json_encode($notifications);
    }

    //FUNÇÃO PARA OBTER NOTIFICAÇÕES NOVAS
    public function quantity()
    {
        $quantity = Notification::query()
            ->where('notifiable_id', '=', Auth::user()->id)
            ->whereNull('seen')
            ->count();

        return $quantity;
    }

    //FUNÇÃO PARA MARCA COMO LIDA AS NOTIFICAÇÕES
    public function seen()
    {
        return $this->repository->seen();
    }
}