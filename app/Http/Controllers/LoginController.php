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
		
		try{
			$res = $authClient->auth($matricula, $senha);

		}catch (\Exception $e) {
			return redirect()->to(route('loginForm'));
		}

		$dados = $authClient->get("/minhas-informacoes/meus-dados/");

		$vinculo = $dados->tipo_vinculo;

		if($vinculo != 'Aluno'){

			$categoria = $dados->vinculo->categoria;

			$request->session()->put('user', [$matricula, $senha, $vinculo, $categoria]);
		}else{
			$request->session()->put('user', [$matricula, $senha, $vinculo]);
		}

		$sessao = $request->session()->get('user');

		return redirect()->to(route('auth'));
	}

	public function auth(){
		if(Session::has('user')) {
			$sessao = Session::get('user');
		}else{
			return redirect()->to(route('loginForm'));
		}

		var_dump($sessao);
		try{
			if(($sessao['2']) == 'Aluno'){
				return redirect()->to(route('aluno.index'));

			}elseif (($sessao['3']) == 'Secretario') {
				return redirect()->to(route('secretario.index'));

			}elseif (($sessao['3']) == 'docente') {
				return redirect()->to(route('professor.index'));

			}else{
				return redirect()->to(route('loginForm'));
			}
		}catch (\Exception $e) {
			return redirect()->to(route('loginForm'));
		}
	}

    public function sair()
    {
    	Session::flush();
    	return redirect()->to(route('loginForm'));
    }
}