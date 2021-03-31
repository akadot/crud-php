<main class="mt-3">

  <section>
    <a href="index.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3"><?= TITLE ?>
  </h2>

  <form method="POST" class="mt-3">

    <div class="form-group mt-2">
      <label>Título da Vaga</label>
      <input type="text" name="title" class="form-control mt-1"
        value="<?= $obVaga->title ?>">
    </div>

    <div class="form-group mt-2">
      <label>Descrição da Vaga</label>
      <textarea name="description" rows="5"
        class="form-control"><?= $obVaga->description ?></textarea>
    </div>

    <div class="form-group mt-2">
      <label>Status</label>

      <div>
        <div class="form-check-inline">
          <label class="form-control">
            <input type="radio" name="active" value="s" checked> Ativo
          </label>
        </div>

        <div class="form-check-inline">
          <label class="form-control">
            <input type="radio" name="active" value="n" <?= 'n' == $obVaga->active ? 'checked' : '' ?>>
            Inativo
          </label>
        </div>
      </div>

    </div>

    <div class="form-group mt-4">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>

</main>