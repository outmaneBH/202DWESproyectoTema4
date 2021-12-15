<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio8 - PDO</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
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
        <footer style="position: fixed;bottom: 0;width: 100%" class="bg-dark text-center text-white">
            <!-- Grid container -->
            <div class="container p-3 pb-0">
                <!-- Section: Social media -->
                <section class="mb-3">
                    <!-- Github -->
                    <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/outmaneBH/202DWESproyectoTema4" target="_blank"role="button">
                        <img id="git" style="width: 30px" src="../webroot/media/icons/git.png" alt="github"/>  
                    </a>
                </section>

            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                Copyrights © 2021 
                <a class="text-white" href="../../index.html">OUTMANE BOUHOU</a>
                . All rights reserved.
            </div>
            <!-- Copyright -->
        </footer>
    </body>
</html>