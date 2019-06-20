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

		return redirect()->to(route('indexAluno'));
	}

    public function sair()
    {
    	Session::flush();
    	return redirect()->to(route('loginForm'));
    }
}