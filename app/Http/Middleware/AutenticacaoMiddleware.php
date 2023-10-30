<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {
        session_start();
        // Verificar se o usuário está autenticado
        if(isset($_SESSION['email']) && $_SESSION['email'] != ''){
            return $next($request); /// Continua a requisição
        }else{
            return redirect()->route('site.login', ['erro' => 2]);

        }
    }
}
