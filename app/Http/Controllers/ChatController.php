<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Unidade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //FUNÇÃO PARA EXIBIR A VIEW (CHAT)
    public function index()
    {
        $user = Helper::getUser(Auth::user()->id)->unidade_id;
        $unidades = explode(',', $user);

        //OBTEM USUARIOS PARA CONTAGEM E ONLINE
        $total = User::all();

        return view('chat.index')
            ->with('total', $total)
            ->with('unidades', $unidades);
    }
}
