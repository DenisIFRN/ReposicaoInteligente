<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Romerito\Suap\SuapClient;
use Ivmelo\SUAP\SUAP;

class ProfessorController extends Controller
{
    public function indexProfessor(){
    	$sessao = Session::get('user');

    	$authClient = new SuapClient;

    	$res = $authClient->auth($sessao(['0']), $sessao['1']);

    	$dadosProfessor = $authClient->get("/minhas-informacoes/meus-dados/");

    	var_dump($dadosProfessor);
    }
}
