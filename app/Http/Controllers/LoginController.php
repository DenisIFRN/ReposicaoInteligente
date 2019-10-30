<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Romerito\Suap\SuapClient;

class LoginController extends Controller
{

	public function loginForm()
	{
		return view('login');
	}

	public function login(Request $request)
	{

		$matricula = $request->matricula;
		$senha = $request->senha;

		$authClient = new SuapClient;

		$res = $authClient->auth($matricula, $senha);

		$dados = $authClient->get("/minhas-informacoes/meus-dados/");

		$vinculo = $dados->tipo_vinculo;

		$request->session()->put('user', [$matricula, $senha, $vinculo]);

		$sessao = $request->session()->get('user');

		return redirect()->to(route('auth'));
	}

	public function auth(){
		if(Session::has('user')) {
			$sessao = Session::get('user');
		}else{
			return redirect()->to(route('loginForm'));
		}
		try{
			if(($sessao['2']) == 'Aluno'){
				return redirect()->to(route('indexAluno'));

			}elseif (($sessao['2']) == 'Secretario') {
				return redirect()->to(route('indexSecretario'));

			}elseif (($sessao['2']) == 'Professor') {
				return redirect()->to(route('indexProfessor'));

			}else{
				return redirect()->to(route('loginForm'));
			}
		}catch (Exception $e) {
			return redirect()->to(route('loginForm'));
		}
	}

    public function sair()
    {
    	Session::flush();
    	return redirect()->to(route('loginForm'));
    }
}