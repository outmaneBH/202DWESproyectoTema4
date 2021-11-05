<?php
/*Llamar la configuracion de pdo*/
require '../config/confDBPDO.php';
/*Llamar la configuracion de pdo*/

$connect = new PDO(HOST, USER,PASSWORD);
// set the PDO error mode to exception
echo "Connected successfully <br>";

echo "<pre>";
print_r($connect);
echo '</pre>';

$attributes = array(
    "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
    "ORACLE_NULLS", "PERSISTENT", "SERVER_INFO", "SERVER_VERSION",
);
//recorrer el array de attributes
foreach ($attributes as $valorAttributes) {
    echo "PDO::ATTR_$valorAttributes: ";
    echo $connect->getAttribute(constant("PDO::ATTR_$valorAttributes")) . "<br>";
}
//cerrar la conexión
unset($miDB);
?>



