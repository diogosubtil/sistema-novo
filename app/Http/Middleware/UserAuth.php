<?php

namespace App\Http\Middleware;

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
            $expiresAt = now()->addMinutes(15);
            if (!Cache::has('user-is-online-' . Auth::user()->id)){
                Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
                User::where('id', Auth::user()->id)->update(['last_seen' => now()]);
            }
        }

        return $next($request);
    }
}
