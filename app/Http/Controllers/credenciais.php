<?php
use Ivmelo\SUAP\SUAP;

$authSuap = new Suap;

    $res = $authSuap->autenticar($sessao['0'], $sessao['1']);

    $dadosAluno = $authSuap->getMeusDados();
        
    $id = $dadosAluno["id"];
    $nome = $dadosAluno["nome_usual"];
    $matricula = $dadosAluno["matricula"];
    $foto = $dadosAluno["url_foto_75x100"];