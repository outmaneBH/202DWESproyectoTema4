<?php
/*Llamar la configuracion de Mysqli*/
require '../config/confDBMySQL.php';

$miDB = new mysqli();

// la Conexión sin errores :
$miDB->connect(HOST, USER, PASSWORD,DB);
//Para controlar los posibles errores de conexión

$error = $miDB->connect_errno;

if ($error != null) {
    echo "<p style='color:red'> $error</p>";
} else {
    echo "<p style='color:green'>Connected successfully</p>";
}
//Ceramos la Conexión
$miDB->close();


// la Conexión con errores :

$miDB->connect(HOST, USER, "paso",DB);
$error = $miDB->connect_errno;

if ($error != null) {
    echo "<p style='color:red'> $error</p>";
} else {
    echo "<p style='color:green'>Connected successfully</p>";
}

//Ceramos la Conexión
$miDB->close();
?>




