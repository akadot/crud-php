<?php

require __DIR__.'/vendor/autoload.php';
// echo '<pre>'; print_r($_POST); echo '</pre>';exit;

use App\Entity\Vaga;

//VALIDAÇÃO DO POST
if (isset($_POST['title'], $_POST['description'], $_POST['active'])) {
    $obVaga = new Vaga(); //cria uma instância da classe

    //adiciona os valores na instância criada
    $obVaga->title = $_POST['title'];
    $obVaga->description = $_POST['description'];
    $obVaga->active = $_POST['active'];
    $obVaga->register(); //cadastra a vaga no banco

    header('location: index.php?=status-success');

    exit;
}

include __DIR__.'/includes/header.php';

include __DIR__.'/includes/form.php';

include __DIR__.'/includes/footer.php';
