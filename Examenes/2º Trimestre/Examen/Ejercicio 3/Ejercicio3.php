
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<?php
//POR ALEJANDRO RODRIGUEZ MENA
require_once('Persona.php');

//Preguntando al profesor, se dio permiso para que los datos sean estaticos sin tener que pedirlos
$nombre1 = "Juan";
$edad1 = 20;
$sexo1 = "H";
$peso1 = 80;
$altura1 = 1.72;

$nombre2 = "Ana";
$edad2 = 16;
$sexo2 = "M";
$peso2 = 60;
$altura2 = 1.65;

$nombre3 = "Pedro";
$edad3 = 15;
$sexo3 = "H";
$peso3 = 40;
$altura3 = 1.80;

// Se crean los objetos
$persona1 = new Persona($nombre1, $edad1, $sexo1, $peso1, $altura1);
$persona2 = new Persona($nombre2, $edad2, $sexo2, $peso2, $altura2);
$persona3 = new Persona($nombre3, $edad3, $sexo3, $peso3, $altura3);

//Se calcula el imc, segun este, el resultado sera diferente
$imc1 = $persona1->calcularIMC();
$imc2 = $persona2->calcularIMC();
$imc3 = $persona3->calcularIMC();

//Se muestra la respuesta segun el peso de cada usuario
echo "<h2>Peso ideal de las 3 personas</h2>";
switch($imc1) {
    case Persona::PESO_BAJO:
        echo $persona1->getNombre() ." tiene peso bajo";
        break;
    case Persona::PESO_IDEAL:
        echo $persona1->getNombre() ." tiene peso ideal";
        break;
    case Persona::SOBREPESO:
        echo $persona1->getNombre() ." tiene sobrepeso";
        break;
}

echo "<br>";
switch($imc2) {
    case Persona::PESO_BAJO:
        echo $persona2->getNombre() ." tiene peso bajo";
        break;
    case Persona::PESO_IDEAL:
        echo $persona2->getNombre() ." tiene peso ideal";
        break;
    case Persona::SOBREPESO:
        echo $persona2->getNombre() ." tiene sobrepeso";
        break;
}

echo "<br>";
switch($imc3) {
    case Persona::PESO_BAJO:
        echo $persona3->getNombre() ." tiene peso bajo";
        break;
    case Persona::PESO_IDEAL:
        echo $persona3->getNombre() ." tiene peso ideal";
        break;
    case Persona::SOBREPESO:
        echo $persona3->getNombre() ." tiene sobrepeso";
        break;
}

echo "<br>";
//Se muestran si las personas son o no menores de edad
echo "<h2>Que personas son mayores o menor de edad</h2>";
if ($persona1->esMayorDeEdad()) {
    echo "La persona 1 es mayor de edad.<br>";
} else {
    echo "La persona 1 es menor de edad.<br>";
}

if ($persona2->esMayorDeEdad()) {
    echo "La persona 2 es mayor de edad.<br>";
} else {
    echo "La persona 2 es menor de edad.<br>";
}

if ($persona3->esMayorDeEdad()) {
    echo "La persona 3 es mayor de edad.<br>";
} else {
    echo "La persona 3 es menor de edad.<br>";
}

//Se agregan amigos
$persona1->setAmigos(array($persona2->getNombre(), $persona3->getNombre()));
$persona2->setAmigos(array($persona1->getNombre(), $persona3->getNombre()));
$persona3->setAmigos(array($persona1->getNombre(), $persona2->getNombre()));

//Llamada a metodo para ver que amigos de objeto3 son mayores de edad
$amigosMayoresDeEdad = $persona3->amigosMayoresDeEdad(array($persona1, $persona2));

echo "<h2>Informacion amigos mayores de edad</h2>";
//Se muestran los amigos del objeto3 mayores de edad
$amigosMayoresDeEdad = implode(", ", $amigosMayoresDeEdad);
echo "Amigos mayores de edad de la persona 3: " . $amigosMayoresDeEdad . "<br>";

// imprimir objetos con metodo magico toString
echo "<h2>Informacion de los 3 objetos</h2>";
echo $persona1 . "<br>";
echo $persona2 . "<br>";
echo $persona3 . "<br>";
