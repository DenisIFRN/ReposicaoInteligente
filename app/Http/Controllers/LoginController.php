<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Ivmelo\SUAP\SUAP;

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

		$authSuap = new Suap;

		$res = $authSuap->autenticar($matricula, $senha);

		$request->session()->put('user', [$matricula, $senha]);
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
			if(strlen($sessao['0']) == 14){
				return redirect()->to(route('indexAluno'));
			}elseif (strlen($sessao['0']) == 7) {
				return redirect()->to(route('indexProfessor'));
			}else{
				return redirect()->to(route('loginForm'));
			}
		} catch (Exception $e) {
			return redirect()->to(route('loginForm'));
		}
	}

    public function sair()
    {
    	Session::flush();
    	return redirect()->to(route('loginForm'));
    }
}