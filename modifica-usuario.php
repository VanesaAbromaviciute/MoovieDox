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
    $CodUser = $_POST["cod"];
    $UserName = $_POST["nombre"];
    $UserLastname = $_POST["apellido"];
    $UserAge = $_POST["edad"];
    $UserNickname = $_POST["nickname"];
  ?>
  <br>
  <div class="container">

    <div class="card">
      <h1 class="text-center">MoovieDox - Modifica usuario</h1>

      <form action="index.php" method="post">
        <input type="hidden" name="accion" value="modificar">
        <input type="hidden" name="CodAntiguo" value="<?= $CodUser ?>">
        <div class="mb-3 aire">
          <label for="cod" class="form-label">Cod</label>
          <input
            type="text"
            class="form-control"
            id="cod"
            name="cod"
            value="<?= $CodUser ?>"
            size="10">
        </div>

        <div class="mb-3 aire">
          <label for="nombre" class="form-label">Nombre</label>
          <input
            type="text"
            class="form-control"
            id="nombre"
            name="nombre"
            value="<?= $UserName ?>">
        </div>

        <div class="mb-3 aire">
          <label for="apellido" class="form-label">Apellido</label>
          <input
            type="text"
            class="form-control"
            id="apellido"
            name="apellido"
            value="<?= $UserLastname ?>">
        </div>

        <div class="mb-3 aire">
          <label for="edad" class="form-label">Año de nacimiento</label>
          <input
            type="date"
            class="form-control"
            id="edad"
            name="edad"
            value="<?= $UserAge ?>">
        </div>

        <div class="mb-3 aire">
          <label for="nickname" class="form-label">Nickname</label>
          <input
            type="text"
            class="form-control"
            id="nickname"
            name="nickname"
            value="<?= $UserNickname ?>">
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