<?php
use APP\Requerimento;
use Faker\Generator as Faker;

$factory->define(App\Requerimento::class, function (Faker $faker) {
    return [
        'id_aluno' => rand(),
        'id_disciplina' => rand(),
        'id_docente' => rand(),
        'foto' => "/media/alunos/75x100/166972.jpg",
        'justificativa' => "lalalala",
        'anexo' => "lala.pdf",
        'data' => "29/10/2019",
        'status' => "Aguardando_Avaliacao"
    ];
});