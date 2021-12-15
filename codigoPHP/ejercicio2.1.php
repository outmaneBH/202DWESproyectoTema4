<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio2 - PDO</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            table,tr,td,th{
                border-collapse: collapse;
                border: 1px solid black;
                text-align: center;
            }
            table{
                width: 100%;
            }
            h2{
                text-align: center;
                font-weight: bold;
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <?php
        /*
         * author: OUTMANE BOUHOU
         * Fecha: 04/11/2021
         * description: 2. Mostrar el contenido de la tabla Departamento y el número de registros.
         */
        require_once '../config/confDBMySQL.php';


        /* Establecemos la connection con mysqli */
        $miDB = new mysqli(HOST, USER, PASSWORD, DB);
        ?>
        <h2>El contenido de la tabla Departamento</h2>
        <table>
            <tr>
                <th>Código del Departamento</th>
                <th>Descripción</th>
                <th>Volumen del negocio</th>
            </tr>

            <?php
            //select el contenido de la tabla con select 
            $sql = 'SELECT * FROM Departamento';

            //usamos query para sacar resultado

            $resultadoConsulta = $miDB->query($sql);


            //mostrar el numero de registros que hemos seleccionado
            echo '
                            <div class="w3-panel w3-blue">
                            <h3>Information!</h3>
                            <p>hay ' . $resultadoConsulta->num_rows . ' resultados.</p>
                            </div>';


            /* Recorrer con while los registros */

            while ($row = $resultadoConsulta->fetch_assoc()) {
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
        /*cerramos la connexion*/
        $miDB->close();
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



