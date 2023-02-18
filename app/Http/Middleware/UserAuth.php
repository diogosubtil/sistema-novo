<?php

namespace App\Http\Middleware;

use App\Models\Unidade;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {

            //VERIFICA SE O USUARIO ESTA ATIVO
            if (Auth::user()->ativo == 'n') {
                Auth::logout();
                Session::flash('message', 'Usuario desativado');
                return to_route('login');
            }

            //USUARIO ONLINE
            if (!Cache::has('user-is-online-' . Auth::user()->id)){
                $expiresAt = now()->addMinutes(15);
                Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
            }

            //OBTEM A PRIMEIRA UNIDADE PARA EXIBIR DADOS NO SISTEMA
            if (!Session::has('unidade')){
                $unidadesUser = explode(',', Auth::user()->unidade_id);
                Session::put(['unidade' => $unidadesUser[0]]);
            }

            //SET TIMEZONE DA UNIDADE
            $unidade = Unidade::query()->where('id', '=', Session::get('unidade'))->first();
            date_default_timezone_set($unidade->timezone);
        }

        return $next($request);
    }
}
