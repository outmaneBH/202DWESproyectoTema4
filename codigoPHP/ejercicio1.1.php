<?php
$miDB = new mysqli();

// la Conexión sin errores :
$miDB->connect('192.168.3.102', 'usuarioDAW202DBDepartamentos', 'P@ssw0rd', 'DAW202DBDepartamentos');
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

$miDB->connect('192.168.3.102', 'usuarioDAW202DBDepartamentos', 'Passo', 'DAW202DBDepartamentos');
$error = $miDB->connect_errno;

if ($error != null) {
    echo "<p style='color:red'>ERROR $error</p>";
} else {
    echo "<p style='color:green'>Conexión establecida correctamente</p>";
}

//Ceramos la Conexión
$miDB->close();
?>




