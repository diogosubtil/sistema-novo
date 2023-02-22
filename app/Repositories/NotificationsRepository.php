<?php

namespace App\Repositories;

use App\Models\Notification;
use Illuminate\Http\Request;

interface NotificationsRepository
{
    //CADASTRA A NOTIFICAÇÃO
    public function add($type, $notifiable_type, $notifiable_id, $data): Notification;

    //MARCA COMO LIDA AS NOTIFICAÇÕES
    public function seen();
}
