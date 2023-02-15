<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\Unidade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegistersController extends Controller
{
    //FUNÇÃO PARA EXIBIR A VIEW (PAINEL)
    public function index(Request $request)
    {
        //OBTEM REGISTROS
        $registers = Register::query();

        if (!$request->has('created_at')){
            $registers->whereBetween('created_at', [date('Y-m-d') . ' 00:00:00', date('Y-m-d') . ' 23:59:59']);
        }

        $registers->filter($request->all());

        //OBTEM AS UNIDADES
        $unidades = Unidade::query()->where('ativo', '=', 's')->get();

        //OBTEM OS USUARIOS
        $users = User::query()->where('unidade_id', '=' ,Session::get('unidade'))->get();

        return view('registers.index')
            ->with('users', $users)
            ->with('unidades', $unidades)
            ->with('registers',$registers->paginate(15));

    }
}
