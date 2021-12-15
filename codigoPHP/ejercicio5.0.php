<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio5 - PDO</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            div{
                padding: 10px;
            }
        </style>
    </head>
    <body>

        <?php
        /*1-CAMBIAR EL EJERCICIO A CUNSULTAS PREPARADAS*/
        
        
        /*
         * author: OUTMANE BOUHOU
         * Fecha: 09/11/2021
         * description: 5. Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.
         */

        /* Llamar al fichero de configuracion de base de datos */
        require '../config/confDBPDO.php';
        try {
            /* Establecemos la connection con pdo */
            $miDB = new PDO(HOST, USER, PASSWORD);

            /* configurar las excepcion */
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $miDB->beginTransaction();

            $sql1 = <<<OB
insert into Departamento(CodDepartamento,DescDepartamento,FechaBaja,VolumenNegocio) values 
('DAM', 'departamento DAM', null, 102.4)
OB;
            $sql2 = <<<OB
insert into Departamento(CodDepartamento,DescDepartamento,FechaBaja,VolumenNegocio) values 
('AKL', 'departamento AKL', null, 10000)
OB;
            $sql3 = <<<OB
insert into Departamento(CodDepartamento,DescDepartamento,FechaBaja,VolumenNegocio) values 
('ABS', 'departamento ABS', null, 15)
OB;


            $miDB->exec($sql1);
            $miDB->exec($sql2);
            $miDB->exec($sql3);

            $miDB->commit();
            echo '
                            <div class="w3-panel w3-blue">
                            <h3>Information!</h3>
                            <p>Se ha insertado todo bien.</p>
                            </div>';
        } catch (PDOException $exception) {
            /* Confirma los cambios y los consolida */
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