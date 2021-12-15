<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio7 - PDO</title>
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
         * Fecha: 15/11/2021
         * description:7.PDO USANSDO LA IMPORTACION CON JSON 
         */
        /* añadimos la configuracion para acceder ala base de datos */
        require_once "../config/confDBPDO.php";

        try {
            echo '<h2>Insert data from Json file To database</h2>';
            
            /* los datos of connection */
            $miDB = new PDO(HOST, USER, PASSWORD);

            /* Cambiar los errores y meter estos datos */
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = <<<OB
                    INSERT INTO Departamento VALUES
                    (:codDepartamento, :descDepartamento, :fechaBaja, :volumenNegocio);
            OB;
            
            $Consulta = $miDB->prepare($sql);
            
            $jsonFile = file_get_contents("../tmp/tablaDepartamento.json");


            $Departamentos = json_decode($jsonFile);
            
            /* Empezamos nuestro transaccion */
            $miDB->beginTransaction();

            foreach ($Departamentos as $Departamento) {
                $Consulta->bindParam(':codDepartamento', $Departamento->codDepartamento);
                $Consulta->bindParam(':descDepartamento', $Departamento->descDepartamento);
                $Consulta->bindParam(':fechaBaja', $Departamento->fechaBaja);
                $Consulta->bindParam(':volumenNegocio', $Departamento->volumenNegocio);

                $Consulta->execute();
            }
            /* Ejecutar el commit */
            $miDB->commit();

            echo '
                            <div class="w3-panel w3-blue">
                            <h3>Information!</h3>
                            <p>Se ha insertado todo bien.</p>
                            </div>';
        } catch (PDOException $exception) {
            /* se algo no esta bien vovlemos el error de transaccion */
            $miDB->rollBack();

            /* Si hay algun error el try muestra el error del codigo */
            echo '<span> Codigo del Error :' . $exception->getCode() . '</span> <br>';

            /* Muestramos su mensage de error */
            echo '<span> Error :' . $exception->getMessage() . '</span> <br>';
        } finally {
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