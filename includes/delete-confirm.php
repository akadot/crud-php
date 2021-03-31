<main class="mt-3">


  <h2 class="mt-3">Excluir Vaga
  </h2>

  <form method="POST" class="mt-3">

    <div class="form-group mt-2">
      <p>Você deseja realmente excluir a vaga: <strong><?=$obVaga->title?></strong></p>
    </div>



    <div class="form-group mt-4">
      <a href="index.php"><button type="button" class="btn btn-danger">Cnacelar</button></a>
      <button type="submit" name="delete" class="btn btn-success">Excluir</button>
    </div>

  </form>

</main>