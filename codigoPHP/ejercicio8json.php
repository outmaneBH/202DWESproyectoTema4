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
         * description:Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un
          fichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR). El fichero exportado se
          encuentra en el directorio .../tmp/ del servidor.
          Si el alumno dispone de tiempo probar distintos formatos de importación - exportación: XML,
          JSON, CSV, TXT,...
         */
        /* Llamar al fichero de configuracion de base de datos */
        require_once '../config/confDBPDO.php';

        try {
            /* Establecemos la connection con pdo en global */
            $miDB = new PDO(HOST, USER, PASSWORD);

            /* configurar las excepcion */
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            /* select el contenido de la tabla con select ^ */
            $sql = 'SELECT * FROM Departamento';

            //esto es un objeto de clase PDOStatement
            $resultadoConsulta = $miDB->query($sql);

            //mostrar el numero de registros que hemos seleccionado
            $numRegistros = $resultadoConsulta->rowCount();
            echo '
                            <div class="w3-panel w3-blue">
                            <h3>Information!</h3>
                            <p>Número de registros: ' . $numRegistros .'</p>
                            </div>';
         

            $aDepartamentos = [];
            //$clave =>
            foreach ($resultadoConsulta as  $valor) {
                $aDepartamento = [
                    //"Deparatemento :"=>$clave,
                    "codeDep" => $valor["CodDepartamento"],
                    "description" => $valor['DescDepartamento'],
                    "salary" => $valor['VolumenNegocio']
                ];
                array_push($aDepartamentos, $aDepartamento);
            }
            print_r($aDepartamentos);

            $json = json_encode($aDepartamentos, JSON_PRETTY_PRINT);
            $bytes = file_put_contents("../tmp/tablaDepartamento.json", $json);
             echo '
                            <div class="w3-panel w3-blue">
                            <h3>Information!</h3>
                            <p>The number of bytes written are '.$bytes.'</p>
                            </div>';
            
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