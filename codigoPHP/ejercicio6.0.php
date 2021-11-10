<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio4.0 - PDO</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            div{
                padding: 10px;
            }
        </style>
    </head>
    <body>

        <?php
        /*
         * author: OUTMANE BOUHOU
         * Fecha: 10/11/2021
         * description: 6.Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos utilizando una consulta preparada. (Después de programar y entender este ejercicio, modificar los ejercicios anteriores para que utilicen consultas preparadas). Probar consultas preparadas sin bind, pasando los parámetros en un array a execute.
         */

        /* Llamar al fichero de configuracion de base de datos */
        require '../config/confDBPDO.php';
        try {
            /* Establecemos la connection con pdo */
            $miDB = new PDO(HOST, USER, PASSWORD);

            /* configurar las excepcion */
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $sql = <<<OB
                    INSERT INTO Departamento(CodDepartamento,DescDepartamento,VolumenNegocio) VALUES 
                     (:codeDep,:description,:salary);    
                    OB;
            $consulta = $miDB->prepare($sql);
            $aDepartamentos = [["codeDep" => "ARB", "description" => "departamento ARB", "salary" => 2000],
                ["codeDep" => "ORS", "description" => "departamento ORS", "salary" => 900],
                ["codeDep" => "OBS", "description" => "departamento OBS", "salary" => 1899]];

            $miDB->beginTransaction();

            foreach ($aDepartamentos as $deparatemento) {
                $aPrametros = [[":codeDep" => $deparatemento["codeDep"]],
                    [":description" => $deparatemento["description"]],
                    [":salary" => $deparatemento["salary"]]];
                $consulta ->execute($aPrametros);
            }
            echo '
                            <div class="w3-panel w3-blue">
                            <h3>Information!</h3>
                            <p>Se ha insertado todo bien.</p>
                            </div>';
            $miDB->commit();
        } catch (PDOException $exception) {
            $miDB->rollback();
            /* Si hay algun error el try muestra el error del codigo */
            echo '<span> Codigo del Error :' . $exception->getCode() . '</span> <br>';

            /* Muestramos su mensage de error */
            echo '<span> Error :' . $exception->getMessage() . '</span> <br>';
        } finally {
            /* Ceramos la connection */
            unset($miDB);
        }
        ?>
    </body>
</html>