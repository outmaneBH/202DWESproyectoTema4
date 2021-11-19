<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio2 - PDO</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    require_once '../config/confDBPDO.php';

    try {
        /* Establecemos la connection con pdo */
        $miDB = new PDO(HOST, USER, PASSWORD);

        /* configurar las excepcion */
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
                
                //usamos las consultas preparadas
                
                $resultadoConsulta = $miDB->prepare($sql);
                $resultadoConsulta->execute();
                
                //mostrar el numero de registros que hemos seleccionado
                echo '
                            <div class="w3-panel w3-blue">
                            <h3>Information!</h3>
                            <p>hay '.$resultadoConsulta->rowCount().' resultados.</p>
                            </div>';
               
                $registroObjeto = $resultadoConsulta->fetchObject();
               /*Recorrer con while los registros*/
                
                while ($registroObjeto) {
                    ?>
                    <tr>
                        <td><?php echo $registroObjeto->CodDepartamento ?></td>
                        <td><?php echo  $registroObjeto->DescDepartamento?></td>
                        <td><?php echo $registroObjeto->VolumenNegocio ?></td>
                    </tr>
                    <?php
                  $registroObjeto = $resultadoConsulta->fetchObject();
                }
                ?>
            </table>
            <?php
        } catch (PDOException $exception) {
            $errorExcepcion = $exception->getCode(); /* meter el codigo del error en $errorExcepcion */
            $mensageExcepcion = $exception->getMessage(); /* meter el mensage del error en $mensageExcepcion */
            echo '<span> Codigo del Error :' . $errorExcepcion . '</span> <br>';
            echo '<span> Error :' . $mensageExcepcion . '</span> <br>';
        } finally {
            //cerrar la conexión
            unset($miDB);
        }
        ?>
    </body>

</html>



