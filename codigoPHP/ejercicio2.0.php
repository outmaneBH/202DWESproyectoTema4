<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio2.0 PDO</title>
        <style>
            table,tr,td,th{
                border-collapse: collapse;
                border: 1px solid black;
                text-align: center;
            }
            table{
                width: 100%;
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
            <table>
                <tr>
                    <th>Código del Departamento</th>
                    <th>Descripción</th>
                    <th>Volumen del negocio</th>
                </tr>

                <?php
                //select el contenido de la tabla con select 
                $sql = 'SELECT * FROM DAW202DBDepartamentos.Departamento';
                
                //esto es un objeto de clase PDOStatement
                $resultadoConsulta = $miDB->query($sql);
                
                //mostrar el numero de registros que hemos seleccionado
                $numRegistros = $resultadoConsulta->rowCount();
                echo '<p style="color: blue"> <strong>Número de registros: ' . $numRegistros . '</strong></p>';

                $registroObjeto = $resultadoConsulta->fetchObject();
               
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



