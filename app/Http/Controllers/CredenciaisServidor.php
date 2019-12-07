<?php
use Romerito\Suap\SuapClient;

$authClient = new SuapClient;

    $res = $authClient->auth($sessao['0'], $sessao['1']);

    $dadosServidor = $authClient->get("/minhas-informacoes/meus-dados/");

    $id = $dadosServidor->id;
	$nome = $dadosServidor->nome_usual;
	$matricula = $dadosServidor->matricula;
	$foto = $dadosServidor->url_foto_75x100;
	$vinculo = $dadosServidor->tipo_vinculo;