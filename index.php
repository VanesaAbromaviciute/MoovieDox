<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MoovieDox</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="icons/font/bootstrap-icons.min.css">
  <style>
    body {
      background: url(../img/elementos-cine-tarjeta-roja-vacia.jpg);
      background-size: cover;
    }

    .table-users tr td {
      background-color: #003049;
      color: white;
      text-align: center;
    }

    .table-users th {
      background-color: #669BBC;
      color: white;
      text-align: center;
    }

    .table-users .table-button {
      display: flex;
      gap:5px ;
    }

    .table-users {
      width:100%;
    }

    .table-container {
      background-color: #FDF0D5;
      color: #669BBC;
    }
  </style>
</head>

<body>

<?php
  $conexion = mysqli_connect("db", "root", "test", "letterbox");

  if (!isset($_POST["accion"])) {
    $_POST["accion"] = "";
  }

  if (!isset($_POST["nombre"])) {
    $_POST["cod"] = "";
    $_POST["nombre"] = "";
    $_POST["apellido"] = "";
    $_POST["edad"] = "";
    $_POST["nickname"] = "";

  }


  if ($_POST["accion"] == "eliminar") {
    $borra = "DELETE FROM user WHERE CodUser=\"$_POST[cod]\"";
    mysqli_query($conexion, $borra);
  }

  if ($_POST["accion"] == "insertar") {
    $inserta = "INSERT INTO user VALUES (\"$_POST[cod]\", \"$_POST[nombre]\", \"$_POST[apellido]\", \"$_POST[edad]\",\"$_POST[nickname]\")";
    mysqli_query($conexion, $inserta);
  }

  if ($_POST["accion"] == "modificar") {
    $modifica = "UPDATE user SET CodUser=\"$_POST[cod]\", UserName=\"$_POST[nombre]\", UserLastname=\"$_POST[apellido]\", UserAge=\"$_POST[edad]\", UserNickname=\"$_POST[nickname]\" WHERE CodUser=\"$_POST[CodAntiguo]\"";
    mysqli_query($conexion, $modifica);
  }

  $consulta = mysqli_query($conexion, "SELECT * FROM user");
  ?>

  <br>
  <div class="container">

    <div class="card table-container">
      <h1 class="text-center ">Usuarios</h1>

      <table class="table table-striped table-users" >
        <tr>
          <th>Cod</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Año de nacimiento</th>
          <th>Nickname</th>
          <th></th>
          <th></th>
        </tr>

        <?php
        while ($registro = mysqli_fetch_array($consulta)) {
        ?>
          <tr>
            <td><div><?= $registro['CodUser'] ?></div></td>
            <td><div><?= $registro['UserName'] ?></div></td>
            <td><?= $registro['UserLastname'] ?></td>
            <td><?= $registro['UserAge'] ?></td>
            <td><?= $registro['UserNickname'] ?></td>

            <!-- Botón para eliminar un cliente de la base de datos -->
            <td>
              <form action="index.php" method="post">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="cod" value="<?= $registro['CodUser'] ?>">
                <button type="submit" class="btn btn-danger table-button">
                  <i class="bi bi-trash3"></i>
                  Eliminar
                </button>
              </form>
            </td>

            <!-- Botón para modificar datos de un usuario -->
            <td>
              <form action="modifica-usuario.php" method="post">
                <input type="hidden" name="cod" value="<?= $registro['CodUser'] ?>">
                <input type="hidden" name="nombre" value="<?= $registro['UserName'] ?>">
                <input type="hidden" name="apellido" value="<?= $registro['UserLastname'] ?>">
                <input type="hidden" name="edad" value="<?= $registro['UserAge'] ?>">
                <input type="hidden" name="nickname" value="<?= $registro['UserNickname'] ?>">
                <button type="submit" class="btn btn-primary table-button">
                  <i class="bi bi-pencil"></i>
                  Modificar
                </button>
              </form>
            </td>
          </tr>
        <?php
        }
        ?>

        <form action="index.php" method="post">
          <input type="hidden" name="accion" value="insertar">
          <tr>
            <td><input type="text" name="cod" size="10" require></td>
            <td><input type="text" name="nombre"></td>
            <td><input type="text" name="apellido"></td>
            <td><input type="text" name="edad" size="10"></td>
            <td><input type="text" name="nickname"></td>
            <td>
              <button type="submit" class="btn btn-success table-button">
                <i class="bi bi-floppy"></i>
                Añadir
              </button>
            </td>
            <td></td>
          </tr>
        </form>
      </table>
    </div>
  </div>
  <br>

 <!--  tabla de películas -->

  <?php

  if (!isset($_POST["accion_2"])) {
    $_POST["accion_2"] = "";
  }
  if (!isset($_POST["pelicula"])) {
    $_POST["pelicula"] = "";
    $_POST["cod"] = "";
    $_POST["salida"] = "";
    $_POST["duracion"] = "";
    $_POST["cod2"] = "";
  }
 
  if ($_POST["accion_2"] == "eliminar_2") {
    $elimina2 = "DELETE FROM movie WHERE CodMovie=\"$_POST[cod]\"";
    mysqli_query($conexion, $elimina2);
  }

  if ($_POST["accion_2"] == "insertar_2") {
    $añade2 = "INSERT INTO movie VALUES ( \"$_POST[cod2]\",\"$_POST[duracion]\",\"$_POST[cod]\", \"$_POST[pelicula]\", \"$_POST[salida]\")";
    mysqli_query($conexion, $añade2);
  }

  if ($_POST["accion_2"] == "modificar_2") {
    $cambia2 = "UPDATE movie SET CodMovie=\"$_POST[cod]\", MovieName=\"$_POST[pelicula]\", ReleaseDate=\"$_POST[salida]\", MovieDuration=\"$_POST[duracion]\", CodDirector=\"$_POST[cod2]\ WHERE CodMovie=\"$_POST[CodAntiguo2]\"";
    mysqli_query($conexion, $cambia2);
  }

  $consulta_2 = mysqli_query($conexion, "SELECT * FROM movie");
  ?>

  <br>
  <div class="container">

    <div class="card table-container">
      <h1 class="text-center ">Películas</h1>

      <table class="table table-striped table-users" >
        <tr>
        <th>Cod Director</th>
          <th>Cod</th>
          <th>Duración de pelicula</th>
          <th>Película</th>
          <th>Año de salida</th>
       
        
          <th></th>
          <th></th>
        </tr>

        <?php
        while ($registro = mysqli_fetch_array($consulta_2)) {
        ?>
          <tr>
            <td><?= $registro['CodDirector'] ?></td>
            <td><div><?= $registro['CodMovie'] ?></div></td>
            <td><?= $registro['MovieDuration'] ?></td>
            <td><div><?= $registro['MovieName'] ?></div></td>
            <td><?= $registro['ReleaseDate'] ?></td>
            

            <!-- Botón para eliminar un cliente de la base de datos -->
            <td>
              <form action="index.php" method="post">
                <input type="hidden" name="accion_2" value="eliminar_2">
                <input type="hidden" name="cod" value="<?= $registro['CodMovie'] ?>">
                <button type="submit" class="btn btn-danger table-button">
                  <i class="bi bi-trash3"></i>
                  Eliminar
                </button>
              </form>
            </td>

            <!-- Botón para modificar datos de un usuario -->
            <td>
              <form action="modifica-pelicula.php" method="post">
              <input type="hidden" name="cod2" value="<?= $registro['CodDirector'] ?>">
                <input type="hidden" name="cod" value="<?= $registro['CodMovie'] ?>">
                <input type="hidden" name="duracion" value="<?= $registro['MovieDuration'] ?>">
                <input type="hidden" name="pelicula" value="<?= $registro['MovieName'] ?>">
                <input type="hidden" name="salida" value="<?= $registro['ReleaseDate'] ?>">
                <button type="submit" class="btn btn-primary table-button">
                  <i class="bi bi-pencil"></i>
                  Modificar
                </button>
              </form>
            </td>
          </tr>
        <?php
        }
        ?>

        <form action="index.php" method="post">
          <input type="hidden" name="accion_2" value="insertar_2">
          <tr>
          <td><input type="text" name="CodDirector" size="10"></td>
            <td><input type="text" name="CodMovie" size="10" require></td>
            <td><input type="text" name="MovieDuration" size="10"></td>
            <td><input type="text" name="MovieName"></td>
            <td><input type="text" name="ReleaseDate"></td>
            <td>
              <button type="submit" class="btn btn-success table-button">
                <i class="bi bi-floppy"></i>
                Añadir
              </button>
            </td>
            <td></td>
          </tr>
        </form>
      </table>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>