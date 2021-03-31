<?php

$message = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
    case 'success':
      $message = '<div class="alert alert-success">Ação executada com sucesso!</div>';
      break;
    
      case 'error':
        $message = '<div class="alert alert-danger">Ação não executada!</div>';
        break;
  }
}

$results = '';
foreach ($vagas as $vaga) {
    $results .= '<tr>
  <td>'.$vaga->id.'</td>
  <td>'.$vaga->title.'</td>
  <td>'.$vaga->description.'</td>
  <td>'.('s' == $vaga->active ? 'Ativo' : 'Inativo').'</td>
  <td>'.date('d/m/Y à\s H:i:s', strtotime($vaga->date)).'</td>
  <td>
    <a href="edit.php?id='.$vaga->id.'"><button type="button" class="btn btn-primary">Editar</button></a>
    <a href="delete.php?id='.$vaga->id.'"><button type="button" class="btn btn-danger">Deletar</button></a>
  </td>
  </tr>';
}

$results = strlen($results) ? $results : '<tr><td colspan="6" class="text-center">Nenhuma vaga encontrada.</td></tr>'

?>

<main class="mt-3">

  <?=$message?>

  <section>
    <a href="register.php">
      <button class="btn btn-success">Cadastrar</button>
    </a>
  </section>

  <section>
    <table class="table bg-light mt-4">
      <thead>
        <tr>
          <td>ID</td>
          <td>Título</td>
          <td>Descrição</td>
          <td>Status</td>
          <td>Data</td>
          <td>Ações</td>
        </tr>
      </thead>
      <tbody>
        <?=$results ?>
      </tbody>
    </table>
  </section>

</main>