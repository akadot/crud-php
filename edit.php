<?php

require __DIR__.'/vendor/autoload.php';
// echo '<pre>'; print_r($_POST); echo '</pre>';exit;

define('TITLE', 'Editar Vaga');

use App\Entity\Vaga;

//VALIDAÇÃO DO ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');

    exit;
}

//CONSULTA A VAGA
$obVaga = Vaga::getVaga($_GET['id']); //cria uma instância da vaga

//VALIDAÇÃO DA VAGA
if (!$obVaga instanceof Vaga) {
    header('location: index.php?status=error');

    exit;
}

//VALIDAÇÃO DO POST
if (isset($_POST['title'], $_POST['description'], $_POST['active'])) {
    //adiciona os valores na instância criada
    $obVaga->title = $_POST['title'];
    $obVaga->description = $_POST['description'];
    $obVaga->active = $_POST['active'];
    $obVaga->update(); //cadastra a vaga no banco

    header('location: index.php?=status-success');

    exit;
}

include __DIR__.'/includes/header.php';

include __DIR__.'/includes/form.php';

include __DIR__.'/includes/footer.php';
