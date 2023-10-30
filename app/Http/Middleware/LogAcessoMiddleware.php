<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Manipulando a requisição($request)
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create([
            'log' => "IP $ip requisitou a rota $rota"
        ]);

        // Manipulando a resposta(Response) antes de ser enviada para o middleware
        $reposta = $next($request);
        $reposta->setStatusCode(201, 'O status da resposta e o texto da resposta foram modificados');
        return $reposta;

    }
}
