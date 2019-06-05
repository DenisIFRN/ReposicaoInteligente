<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Ivmelo\SUAP\SUAP;

class LoginController extends Controller
{

	public function loginForm()
	{
		return view('index');
	}

	public function login(Request $request)
	{

		$matricula = $request->matricula;
		$senha = $request->senha;

		$teste = new Suap;

		$res = $teste->autenticar($matricula, $senha);

		$request->session()->put('user', [$matricula, $senha]);
		$lala = $request->session()->get('user');

		return redirect()->to(route('mostrar'));
	}

    public function sair()
    {
    	Session::flush();
    	return redirect()->to(route('loginForm'));
    }
}