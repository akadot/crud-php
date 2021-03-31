<?php

$results = '';
foreach ($vagas as $vaga) {
    $results .= '<tr>
  <td>'.$vaga->id.'</td>
  <td>'.$vaga->title.'</td>
  <td>'.$vaga->description.'</td>
  <td>'.('s' == $vaga->active ? 'Ativo' : 'Inativo').'</td>
  <td>'.date('d/m/Y à\s H:i:s', strtotime($vaga->date)).'</td>
  <td></td>
  </tr>';
}

?>

<main class="mt-3">

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
        <?php echo $results; ?>
      </tbody>
    </table>
  </section>

</main>