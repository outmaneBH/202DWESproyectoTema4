<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio2.1 MYSQLI</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Código del Departamento</th>
                <th>Descripción</th>
                <th>Volumen del negocio</th>
            </tr>
            <?php
//llamar al fichero de connction
            require '../config/confDBMySQL.php';

// establecer la connection
            $miDB = new mysqli(HOST, USER, PASSWORD, DB);
// Check connection
            if ($miDB->connect_errno) {
                die("Connection failed: " . $miDB->connect_errno);
            }

            $sql = "SELECT * FROM Departamento ";
            $result = $miDB->query($sql);

            if ($result->num_rows > 0) {
                // recorrer el los resultados que hemos seleccionado desde base de datos
                while ($consulta = $result->fetch_array()) {
                    ?>

                    <tr>
                        <td><?php echo $row['CodDepartamento']; ?></td>
                        <td><?php echo $row['DescDepartamento']; ?></td>
                        <td><?php echo $row['VolumenNegocio']; ?></td>
                    </tr>

                    <?php
                }
            } else {
                echo "no hay resultados";
            }
            $miDB->close()
            ?>
        </table>
    </body>
</html>



