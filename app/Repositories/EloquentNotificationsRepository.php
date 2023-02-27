<?php

namespace App\Repositories;

use App\Http\Requests\SettingsFormRequest;
use App\Models\Notification;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Image;

class EloquentNotificationsRepository implements NotificationsRepository
{
    //FUNÇÃO PARA CADASTRAR NO BANCO
    public function add($type, $notifiable_type, $notifiable_id, $data): Notification
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O CADASTRO
        $insert['type'] = $type;
        $insert['notifiable_type'] = $notifiable_type;
        $insert['notifiable_id'] = $notifiable_id;
        $insert['data'] = json_encode($data);
        $notification = Notification::create($insert);

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        return $notification;
    }

    //FUNÇÃO PARA UPDATE NO BANCO E MARCAR COMO LIDAS AS NOTIFICAÇÕES
    public function seen()
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O CADASTRO
        $notifications = Notification::query()
            ->where('notifiable_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->whereNull('seen')
            ->update(['seen' => date('Y-m-d H:i:s')]);

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        return true;
    }

    //FUNÇÃO PARA OBTER AS NOTIFICAÇÕES
    public function get(Request $request)
    {
        return Notification::query()
            ->where('notifiable_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->limit($request->limit)
            ->get();

    }

    //FUNÇÃO PARA OBTER QUANTIDADE DE NOTIFICAÇÕES NOVAS
    public function quantity()
    {
        return Notification::query()
            ->where('notifiable_id', '=', Auth::user()->id)
            ->whereNull('seen')
            ->count();
    }
}
