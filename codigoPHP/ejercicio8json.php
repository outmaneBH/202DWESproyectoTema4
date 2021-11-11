<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio8 - PDO</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>

        </style>
    </head>
    <body>

        <?php
        /*
         * author: OUTMANE BOUHOU
         * Fecha: 11/11/2021
         * description:8.Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla
          Departamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en el
          directorio .../tmp/ del servidor.
         */
        /* Llamar al fichero de configuracion de base de datos */
        require_once '../config/confDBPDO.php';

        try {
            /* Establecemos la connection con pdo en global */
            $miDB = new PDO(HOST, USER, PASSWORD);

            /* configurar las excepcion */
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//select el contenido de la tabla con select 
            $sql = 'SELECT * FROM Departamento';

            //esto es un objeto de clase PDOStatement
            $resultadoConsulta = $miDB->query($sql);

            //mostrar el numero de registros que hemos seleccionado
            $numRegistros = $resultadoConsulta->rowCount();
            echo '<p style="color: blue"> <strong>Número de registros: ' . $numRegistros . '</strong></p>';


            foreach ($resultadoConsulta as $row) { 
                $array = [
                    "codeDep" => $row["CodDepartamento"],
                    "description" => $row['DescDepartamento'],
                    "salary" => $row['VolumenNegocio']
                ];
                
            }
            print_r($array);

            $json = json_encode($array);
            $bytes = file_put_contents("/tmp/myfile.json", $json);
            echo "The number of bytes written are $bytes.";
        } catch (PDOException $exception) {

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