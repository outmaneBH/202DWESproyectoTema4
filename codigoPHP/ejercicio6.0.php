<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio6 - PDO</title>
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
        require_once '../config/confDBPDO.php';
        try {

            /* Establecemos la connection con pdo */
            $miDB = new PDO(HOST, USER, PASSWORD);

            /* configurar las excepcion */
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            /* Iniciar el array departamentos con tres registros */
            $aDepartamentos = [["CodDepartamento" => 'ARB', "DescDepartamento" => 'departamento ARB', "VolumenNegocio" => 2000],
                ["CodDepartamento" => 'ORS', "DescDepartamento" => 'departamento ORS', "VolumenNegocio" => 900],
                ["CodDepartamento" => 'OBS', "DescDepartamento" => 'departamento OBS', "VolumenNegocio" => 1899]];

            /* Insertamos datos en nuestro tabla con insert uy con prepare */
            $sql = "
                   INSERT INTO Departamento (CodDepartamento, DescDepartamento, VolumenNegocio) VALUES 
                            (:CodDepartamento, :DescDepartamento, :VolumenNegocio);    
                    ";

            /* Preparamos la consulta */
            $consulta = $miDB->prepare($sql);


            /* Empezamos nuestro transaccion */
            $miDB->beginTransaction();

            /* Recorrer el array que hemos declarado antes de departementos */

            foreach ($aDepartamentos as $departamento) {//Recorremos los registros que vamos a insertar en la tabla
                $parametros = [":CodDepartamento" => $departamento["CodDepartamento"],
                    ":DescDepartamento" => $departamento["DescDepartamento"],
                    ":VolumenNegocio" => $departamento["VolumenNegocio"]];
                /* execute la consulta */
                $consulta->execute($parametros);
            }
            /* Ejecutar el commit */
            $miDB->commit();

            /* si todo ha ido bien mostramos el mensage de exito. */
            echo '
                            <div class="w3-panel w3-blue">
                            <h3>Information!</h3>
                            <p>Se ha insertado todo bien.</p>
                            </div>';
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