<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    //FUNÇÃO PARA EXIBIR A VIEW (CHAT)
    public function index()
    {
        return view('chat.index');
    }
}
