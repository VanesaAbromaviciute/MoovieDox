<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MoovieDox - Modifica usuario</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="icons/font/bootstrap-icons.min.css">
  <style>
    .aire {
      padding: 10px 60px 10px 60px;
    }

    a {
      text-decoration: none;
      color: white;
    }
  </style>
</head>

<body>
  <?php
    $CodMovie = $_POST["cod"];
    $MovieName = $_POST["pelicula"];
    $ReleaseDate = $_POST["salida"];
    $MovieDuration = $_POST["duracion"];
    $CodDirector = $_POST["cod2"];
  ?>
  <br>
  <div class="container">

    <div class="card">
      <h1 class="text-center">MoovieDox - Modifica película</h1>

      <form action="index.php" method="post">
        <input type="hidden" name="accion_2" value="modificar_2">
        <input type="hidden" name="CodAntiguo2" value="<?= $CodMovie ?>">
        <div class="mb-3 aire">
          <label for="cod" class="form-label">Cod</label>
          <input
            type="text"
            class="form-control"
            id="cod"
            name="cod"
            value="<?= $CodMovie ?>"
            size="10">
        </div>

        <div class="mb-3 aire">
          <label for="pelicula" class="form-label">Película</label>
          <input
            type="text"
            class="form-control"
            id="pelicula"
            name="pelicula"
            value="<?= $MovieName ?>">
        </div>

        <div class="mb-3 aire">
          <label for="salida" class="form-label">Año de salida</label>
          <input
            type="text"
            class="form-control"
            id="salida"
            name="salida"
            value="<?= $ReleaseDate ?>">
        </div>

        <div class="mb-3 aire">
          <label for="duracion" class="form-label">Duración</label>
          <input
            type="date"
            class="form-control"
            id="duracion"
            name="duracion"
            value="<?= $MovieDuration ?>">
        </div>

        <div class="mb-3 aire">
          <label for="cod2" class="form-label">Cod Director</label>
          <input
            type="text"
            class="form-control"
            id="cod2"
            name="cod2"
            value="<?= $MovieDuration ?>">
        </div>


        <div class="mb-3 aire">
          <button type="submit" class="btn btn-success">
            Aceptar
          </button>

          <button class="btn btn-danger">
            <a href="./index.php">
              Cancelar
            </a>
          </button>
          
        <div>
      </form>

    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>