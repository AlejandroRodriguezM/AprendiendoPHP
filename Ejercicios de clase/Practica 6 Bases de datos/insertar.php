<?php
include 'config/misfunciones.php';

//definir las variables y los campos vacíos
$nameErr = $emailErr = "";

// asignar valores a las variables
if (isset($_REQUEST["nombre"])) { //se puede hacer con empty en lugar de isset
  $name = $_REQUEST["nombre"];
} else {
  $name = ""; //crea la variable vacía, si el usuario se le olvida el email una vez enviado, el nombre quedará estando en el formulario
}

if (isset($_REQUEST["mail"])) {
  $mail = $_REQUEST["mail"];
} else {
  $mail = "";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { //es otra manera de ponerlo es igual que poner directamente $_POST
  if (empty($_POST["nombre"])) {
    $nameErr = "Introduce el nombre";
  } else {
    $name = test_input($_POST["nombre"]); //te devuelve los valores ya limpiados de la funcion test_input
    //introduce solo texto o espacios en blanco(no es necesario, se puede poner html):
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) { // barra y ^significa que empieza por a minus o mayusculas y el * que se repite todas las veces que se quiera (despues de la Z hay un espacio q tb se incluye) /^empieza y termina $/
      $nameErr = "solo letras y espacios en blanco";
    }
  }

  //validamos el email
  if (empty($_POST["mail"])) {
    $emailErr = "Introduce el email";
  } else {
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Formato incorrecto";
    }
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Cursos</title>
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
  <fieldset class="scrollmenu">
    <a href="principal.php">Inicio</a>
    <a href="insertar.php">Insertar</a>
    <a href="listar.php">Listar</a>
    <a href="borrar.php">Borrar</a>
    <a href="modificar.php">Modificar</a>
  </fieldset>

   <p><span class="error">* required field</span></p>
  <!--$_SERVER  te dice la pagina concreta donde estás, lo que significa insertar.php
q se cargue la pagina dnd estas, en verdad, el htmlspecialchars (es pa darle seguridad), pero no haría falta ponerlo (se suele hacer en javascript)-->
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nombre: <input type="text" name="nombre" placeholder="Introduce nombre" value="<?php echo $name; ?>" autofocus>
    <span class="error">*<?php echo $nameErr; ?>
      <!--aqui se metera codigo para php-->
    </span>
    <br><br>
    E-mail: <input type="text" name="mail" placeholder="Introduce Email" value="<?php echo $mail; ?>">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>
    Seleccione el curso:
    <select name="CodigoCurso">
      <option value="1">PHP</option>
      <option value="2">ASP</option>
      <option value="3">JSP</option>
    </select>
    <br><br>
    <input type="submit" name="submit" value="Enviar">
    <input type="reset" value="Restaurar">
  </form>
  <?php
  if (($_SERVER["REQUEST_METHOD"] == "POST") && ($emailErr == "") && ($nameErr == "")) {
    //si el usuario ha pulsado el boton enviar y no hay errores en los campos
    $curso = $_REQUEST["CodigoCurso"];
    $bd = "colegio";
    $query = "insert into alumnos(Nombre, Email, CodigoCurso) values ('$name', '$mail', $curso)";
    insertar($query, $bd);

    echo "El alumno fue dado de alta";
  }


  ?>

</body>

</html>