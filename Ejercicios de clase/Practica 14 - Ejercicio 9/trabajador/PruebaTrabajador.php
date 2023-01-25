<!DOCTYPE html>
<html lang="es">  
  <head>    
    <title>Título de la WEB</title>    
    <meta charset="UTF-8">
    <meta name="title" content="Título de la WEB">
    <meta name="description" content="Descripción de la WEB"> 
    </head>
    <style>
        div.formulario{
            display: flex;
            padding: 10px; 
        }
        form{
           margin-left:30px;
            border:1px solid black;
            border-radius: 10px;
            padding:10px;
        }
    </style>
  <body>  
   
    <div class="formulario">
    <form method="post" action="PruebaTrabajador.php">
        <label for="num1">Ingrese un nombre:</label>
        <input type="text" name="nombreGerente">
        <br>
        <label for="num2">Ingrese Apellidos:</label>
        <input type="text" name="apellidosGerente">
       <br>
       <label for="num2">Ingrese Edad:</label>
        <input type="number" name="edadGerente">
       <br>
       <label for="num2">Ingrese Sueldo:</label>
        <input type="number" name="sueldoGerente">
       <br>
        <input type="submit" name="crearGerente" value="Crear Gerente">
     </form>
     <form method="post" action="PruebaTrabajador.php">
        <label for="num1">Ingrese un telefono Empleado:</label>
        <input type="text" name="telefono">
       
       <br>
        <input type="submit" name="ingresar" value="Ingresar Telefono">
        <input type="submit" name="vaciar" value="Vaciar Telefonos">
     </form>
     <form method="post" action="PruebaTrabajador.php">
        <label for="num1">Ingrese un telefono Gerente:</label>
        <input type="text" name="telefono2">
       
       <br>
        <input type="submit" name="ingresar2" value="Ingresar Telefono">
        <input type="submit" name="vaciar2" value="Vaciar Telefonos">
     </form>
     <form method="post" action="PruebaTrabajador.php">
        <label for="num1">Ingrese un nombre:</label>
        <input type="text" name="nombre">
        <br>
        <label for="num2">Ingrese Apellidos:</label>
        <input type="text" name="apellidos">
       <br>
       <label for="num2">Ingrese Edad:</label>
        <input type="number" name="edad">
       <br>
       <label for="num2">Ingrese Horas:</label>
        <input type="number" name="horas">
       <br>
       <label for="num2">Ingrese Precio x Horas:</label>
        <input type="number" name="precio">
       <br>
        <input type="submit" name="crear" value="Crear Empleado" >
     </form>
     <form method="post" action="PruebaTrabajador.php">
          <input type="submit" name="mostrar" value="Mostrar Empleado">
          <input type="submit" name="mostrar2" value="Mostrar Gerente">
     </form>
     </div>
     <div id="resultado">
      <?php
         require_once('Persona.php');
         require_once('Trabajador.php');
         require_once('Empleado.php');
         require_once('Gerente.php');
         session_start();
         
         /*Gestion Empleado*/
         if(isset($_POST['crear'])){
            $nombre=$_POST['nombre'];
            $apellidos=$_POST['apellidos'];
            $edad=$_POST['edad'];
            $horas=$_POST['horas'];
            $precio=$_POST['precio'];
            $empleado = new Empleado($nombre,$apellidos,$edad,$horas,$precio);
            $_SESSION['empleado']=$empleado;
         }
         if (isset($_SESSION['empleado']) && isset($_POST['ingresar'])){
            $empleado=$_SESSION['empleado'];
            $tel=$_POST['telefono'];
            $empleado->anyadirTelefonos($tel);
            $_SESSION['empleado']=$empleado;
         }
         if (isset($_SESSION['empleado']) && isset($_POST['vaciar'])){
            $empleado=$_SESSION['empleado'];
            $empleado->vaciarTelefonos();
            $_SESSION['empleado']=$empleado;
         }
         if (isset($_SESSION['empleado']) && isset($_POST['mostrar'])){
            $empleado=$_SESSION['empleado'];
            echo "<p>DATOS PERSONALES</p>";
            $empleado->imprimir();
            echo "<p>".$empleado->listarTelefonos()."</p>";
            echo "<p>Sueldo:".$empleado->calcularSueldo()."</p>";
            if($empleado->debePagarImpuestos()){
               echo "<p>Debe pagar impuestos</p>";
            }
            else
            {
               echo "<p>No debe pagar impuestos</p>";
            }
         }
         /*Gestion Gerente */
         
         if(isset($_POST['crearGerente'])){
            $nombre=$_POST['nombreGerente'];
            $apellidos=$_POST['apellidosGerente'];
            $edad=$_POST['edadGerente'];
            $salario=$_POST['sueldoGerente'];

            $gerente = new Gerente($nombre,$apellidos,$edad,$salario);
            $_SESSION['gerente']=$gerente;
         }

         if (isset($_SESSION['gerente']) && isset($_POST['ingresar2'])){
            $gerente=$_SESSION['gerente'];
            $tel=$_POST['telefono2'];
            $gerente->anyadirTelefonos($tel);
            $_SESSION['gerente']=$gerente;
         }
         if (isset($_SESSION['gerente']) && isset($_POST['vaciar2'])){
            $gerente=$_SESSION['gerente'];
            $gerente->vaciarTelefonos();
            $_SESSION['gerente']=$gerente;
         }
         if (isset($_SESSION['gerente']) && isset($_POST['mostrar2'])){
            $gerente=$_SESSION['gerente'];
            echo "<p>DATOS GERENTES</p>";
            $gerente->imprimir();
            echo "<p>".$gerente->listarTelefonos()."</p>";
            echo "<p>Sueldo:".$gerente->calcularSueldo()."</p>";
            if($gerente->debePagarImpuestos()){
               echo "<p>Debe pagar impuestos</p>";
            }
            else
            {
               echo "<p>No debe pagar impuestos</p>";
            }
         }
      ?>
     </div>
  </body>  
</html>