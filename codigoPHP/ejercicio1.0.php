<?php
/*Me falta terminar este ejerciico el FORMATO*/

/* Llamar la configuracion de pdo host y usuario */
require '../config/confDBPDO.php';

/*
 * mostarando todo el codigo cuando todo esta bien 
 */
echo '<h3>Correct Cocnnection</h3>';

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
    echo '<table>';
    foreach ($aAttributes as $valorAttributes) {
        echo '<tr>';
        echo "<td>"."PDO::ATTR_$valorAttributes:"."</td>";
        echo "<td>".$miDB->getAttribute(constant("PDO::ATTR_$valorAttributes")) . "</td><br>";
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


echo '<h3>Error Cocnnection</h3>';


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

    echo "Connected successfully <br>";
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



