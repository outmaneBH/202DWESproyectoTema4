<!DOCTYPE html>
<html>
<title>Connexion</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    body{
        padding: 10px;
    }
    </style>
<body>
<?php

/* Llamar la configuracion de pdo host y usuario */
require '../config/confDBPDO.php';

/*
 * mostarando todo el codigo cuando todo esta bien 
 */
echo '<h1>Conexión a la base de datos con la cuenta usuario :</h1>';
echo "<h3 style='color:red;'>Correct Connection</h3>";

/* usamos el try catch para mostarar si hay errores */
try {
    echo " <h3 style='color:blue;'>Connected successfully </h3>";

    /* Establecemos la connection con pdo */
    $miDB = new PDO(HOST, USER, PASSWORD);

    /* configurar las excepcion */
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /* Iniciar un array con diferntes attributos */
    $aAttributes = [
        "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
        "ORACLE_NULLS", "PERSISTENT", "SERVER_INFO", "SERVER_VERSION",
    ];

    /* recorrer el array de attributes */
    echo '<table class="w3-table w3-bordered"><tr class="w3-green"><td>Attribute</td><td>Valor</td></tr>';
    foreach ($aAttributes as $valorAttributes) {
        echo '<tr>';
        echo "<td>" . "PDO::ATTR_$valorAttributes:" . "</td>";
        echo "<td >" . $miDB->getAttribute(constant("PDO::ATTR_$valorAttributes")) . "</td>";
        echo '</tr>';
    } echo '</table>';
    
} catch (PDOException $exception) {
    $errorExcepcion = $exception->getCode(); /* meter el codigo del error en $errorExcepcion */
    
    $mensageExcepcion = $exception->getMessage(); /* meter el mensage del error en $mensageExcepcion */
    
    echo '<span> Codigo del Error :' . $errorExcepcion . '</span> <br>';
    
    echo '<span> Error :' . $mensageExcepcion . '</span> <br>';
} finally {
    //cerrar la conexión
    unset($miDB);
}


echo "<h3 style='color:red;'>Error Cocnnection</h3>";

/* usamos el try catch para mostarar si hay errores */
try {
    
    /* Establecemos la connection con pdo mal hecha */
    $miDB = new PDO(HOST, "ob", "12345test");

    /* configurar las excepcion */
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /* Iniciar un array con diferntes attributos */
    $aAttributes = [
        "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
        "ORACLE_NULLS", "PERSISTENT", "SERVER_INFO", "SERVER_VERSION",
    ];

    /* recorrer el array de attributes */
    foreach ($aAttributes as $valorAttributes) {
        echo "PDO::ATTR_$valorAttributes: ";
        echo $miDB->getAttribute(constant("PDO::ATTR_$valorAttributes")) . "<br>";
    }
 
} catch (PDOException $exception) {
    $errorExcepcion = $exception->getCode(); /* meter el codigo del error en $errorExcepcion */
    $mensageExcepcion = $exception->getMessage(); /* meter el mensage del error en $mensageExcepcion */
    echo '<span> Codigo del Error :' . $errorExcepcion . '</span> <br>';
    echo '<span> Error :' . $mensageExcepcion . '</span> <br>';
} finally {
    //cerrar la conexión
    unset($miDB);
}
?>
</body>
</html>


