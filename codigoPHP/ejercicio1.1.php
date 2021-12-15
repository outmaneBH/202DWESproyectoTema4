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
        /* Llamar la configuracion de mysqli host y usuario */
        require '../config/confDBMySQL.php';

        /*
         * mostarando todo el codigo cuando todo esta bien 
         */
        echo '<h1>Conexión a la base de datos con MYSQLI :</h1>';
        echo "<h4 style='color:red;'>1-Correct Connection</h4>";

        /* Establecemos la connection con mysqli */
        $miDB = new mysqli(HOST, USER, PASSWORD);
        if ($miDB->connect_error) {
            echo ("Connection failed: " . $conn->connect_error);
        }
        echo " <h3 style='color:blue;'>Connected successfully </h3>";

        $miDB->close();
        
        /* Uso de error conexion */
        echo "<h3 style='color:red;'>2-Error Cocnnection</h3>";

        /* Establecemos la connection con mysqli mal hecha */
        $miDB = new mysqli(HOST, "ob", "12345test");
        if ($miDB->connect_error) {
            echo ("Connection failed: " . $conn->connect_error);
        }
        $miDB->close();;
        ?>
    </body>
</html>


