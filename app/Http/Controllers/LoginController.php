<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){
        #Obtendo o valor do param opcional erro, pelo método autenticar(get)
        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou senha não existe(m)';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessário realizar login para ter acesso a página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required'
        ];

        $feedback_autenticacao = [
            'usuario.required' => 'O campo usuário (e-mail) é obrigatório!',
            'usuario.email' => 'O e-mail informado não é válido.',
            'senha.required' => 'O campo senha é obrigatório!'
        ];

        $request->validate($regras, $feedback_autenticacao);

        $email = $request->get('usuario');
        $senha = $request->get('senha');

        echo "Usuário: $email | Senha: $senha";
        echo '<br>';

        // Iniciando o model padrão do Laravel(User)
        $user = new User();
        $usuario = $user->where('email', $email)
            ->where('password', $senha)
            ->get()
            ->first();

        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        }else{
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
