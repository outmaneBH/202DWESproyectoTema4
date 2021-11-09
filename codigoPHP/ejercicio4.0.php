<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio4.0 - PDO</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            span{
                color:red;
            }
            #t1{
                
                position: relative;
                left:  33%;
                top: 110px;
                border-top:  1px solid aqua;
                border-bottom:  1px solid aqua;
            }
            #t1 td{
                padding: 20px;
            }
            
        </style>
    </head>
    <body>

        <?php
        /*
         * author: OUTMANE BOUHOU
         * Fecha: 09/11/2021
         * description: 4. Formulario   de   búsqueda   de   departamentos   por   descripción   (por   una   parte   del   campo
DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos)
         */

        /* usar la libreria de validacion */
        require_once '../core/210322ValidacionFormularios.php';

        /* Llamar al fichero de configuracion de base de datos */
        require '../config/confDBPDO.php';

        /* definir un variable constante obligatorio a 1 */
        define("OBLIGATORIO", 1);
        /* definir un variable constante opcional a 0 */
        define("OPCIONAL", 0);

        /* Variable de entrada correcta inicializada a true */
        $entradaOK = true;

        /* definir un array para alamcenar errores del description */
        $aErrores = [
            "description" => null
        ];

        /* Array de respuestas inicializado a null */
        $aRespuestas = ["description" => null
        ];

        /* Establecemos la connection con pdo en global */
        $miDB = new PDO(HOST, USER, PASSWORD);

        /* configurar las excepcion */
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        /* comprobar si ha pulsado el button enviar */
        if (isset($_REQUEST['submitbtn'])) {
            //Para cada campo del formulario: Validamos la entrada y actuar en consecuencia
            //Validar entrada
            //Comprobar si el campo description  esta rellenado 
            $aErrores["description"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['description'], 1000, 10, OPCIONAL);


            //recorrer el array de errores
            foreach ($aErrores as $nombreCampo => $value) {
                //Comprobar si el campo ha sido rellenado
                if ($value != null) {
                    $_REQUEST[$nombreCampo] = "";
                    // cuando encontremos un error
                    $entradaOK = false;
                }
            }
        } else {
            //El formulario no se ha rellenado nunca
            $entradaOK = false;
        }
        if ($entradaOK) {
            //Tratamiento del formulario - Tratamiento de datos OK
            /* almacenamos los datos correctos */
            $aRespuestas = [
                "codeDep" => $_REQUEST['codeDep'],
                "description" => $_REQUEST['description'],
                "salary" => $_REQUEST['salary']
            ];
            ?>
            <div id="div2">
                <table id="t2" class="w3-table w3-bordered">
                    <tr>
                        <th>Código del Departamento</th>
                        <th>Descripción</th>
                        <th>Volumen del negocio</th>
                    </tr>
                    <?php
                    try {
                        if ($_REQUEST['description']=="") {
                            $sql = "SELECT * from Departamento";
                            $resultadoConsulta = $miDB->query($sql);
                            /* Recorrer el resultado de la consulta */
                            $registroObjeto = $resultadoConsulta->fetchObject();

                            while ($registroObjeto) {
                                //Mostrar los datos correctos obligatorios
                                ?>
                                <tr>
                                    <td><?php echo $registroObjeto->CodDepartamento; ?></td>
                                    <td><?php echo $registroObjeto->DescDepartamento; ?></td>
                                    <td><?php echo $registroObjeto->VolumenNegocio; ?></td>
                                </tr>

                                <?php
                                $registroObjeto = $resultadoConsulta->fetchObject();
                            }
                        } else {

                            $sql2 = "SELECT * from Departamento where DescDepartamento = '" . $_REQUEST['description'] . "'";
                            $resultadoConsulta = $miDB->query($sql2);

                            if ($resultadoConsulta->rowCount() > 0) {
                                /* Recorrer el resultado de la consulta */
                                $registroObjeto = $resultadoConsulta->fetchObject();

                                while ($registroObjeto) {

                                    //Mostrar los datos correctos obligatorios
                                    ?>
                                    <tr>
                                        <td><?php echo $registroObjeto->CodDepartamento; ?></td>
                                        <td><?php echo $registroObjeto->DescDepartamento; ?></td>
                                        <td><?php echo $registroObjeto->VolumenNegocio; ?></td>
                                    </tr>

                                    <?php
                                    $registroObjeto = $resultadoConsulta->fetchObject();
                                }
                            } else {
                                /* mostrar el numero de registros que hemos seleccionado */
                                echo '
                            <div class="w3-panel w3-blue">
                            <h3>Information!</h3>
                            <p>No hay resultados sobre este description.</p>
                            </div>';
                            }
                        }
                        ?>
                    </table>
                </div>
                <?php
            } catch (PDOException $exception) {
                /* Si hay algun error el try muestra el error del codigo */
                echo '<span> Codigo del Error :' . $exception->getCode() . '</span> <br>';

                /* Muestramos su mensage de error */
                echo '<span> Error :' . $exception->getMessage() . '</span> <br>';
            } finally {
                /* Ceramos la connection */
                unset($miDB);
            }
        } else {
            //Mostrar el formulario hasta que lo rellenemos correctamente
            //Mostrar formulario
            ?>
            <div>
                <table id="t1">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

                        <!--El campo description obligatorio -->
                        <tr>
                            <td><label><strong>Que quieres buscar :</strong></label></td>
                        </tr>
                        <tr>
                            <td><label>Descripción   :</label></td>
                            <td><input type="text"  name="description" value="<?php echo (isset($_REQUEST['description']) ? $_REQUEST['description'] : null); ?>"/></td>
                            <td><span><?php echo ($aErrores["description"] != null ? $aErrores['description'] : null); ?></span></td>
                        </tr>
                        <tr> 
                            <td><input type="submit" class="w3-btn w3-teal" name="submitbtn" value="Buscar"/></td>
                            <td><input type="reset" class="w3-btn w3-red" name="resetbtn" value="Borrar"/></td>
                        </tr>
                    </form>
                </table>

            </div>
            <?php
        }
        ?>



    </body>
</html>



