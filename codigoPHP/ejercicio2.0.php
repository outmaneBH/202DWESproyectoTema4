<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio2.0</title>
    </head>
    <?php
    /*
     * author: OUTMANE BOUHOU
     * Fecha: 04/11/2021
     * description: 2. Mostrar el contenido de la tabla Departamento y el número de registros.
     */

//la 
    $miDB = new PDO("mysql:host=192.168.3.102;bname=DAW202DBDepartamentos", "usuarioDAW202DBDepartamentos", "P@ssw0rd");

    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//select el contenido de la tabla con select 
    $sql = "SELECT * FROM Departamento";
    ?>
    <body>
        <table>
            <tr>
                <th>Código del Departamento</th>
                <th>Descripción</th>
                <th>Volumen del negocio</th>
            </tr>

            <?php
            // la consulta sql
            $resultadoConsulta = $miDB->query($sql)->fetchAll();
            foreach ($data as $row) {
                ?>
                <tr>
                    <td><?php echo $row['CodDepartamento']; ?></td>
                    <td><?php echo $row['DescDepartamento']; ?></td>
                    <td><?php echo $row['VolumenNegocio']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
        $numRegistros = $miDB->exec('select count(*) from Departamento');
        echo '<p style="color: blue"> <strong>Número de registros: ' . $numRegistros . '</strong></p>';
            //Cerrar la conexión
        unset($miDB);
        ?>
    </body>

</html>



