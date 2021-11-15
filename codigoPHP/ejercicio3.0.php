<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio3.0-PDO</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            #t1{
                position: relative;
                left:  23%;
                top: 110px;
                border-top:  1px solid aqua;
                border-bottom:  1px solid aqua;
            }
            #t1 td{
                padding: 20px;
            }
            span{
                color: red;
            }
            .w3-btn{
                width: 105px;
                font-size: small;
            }
            #div2{
                padding: 20px;
            }
            #t2 {
                text-align: center;
            }

        </style>
    </head>
    <body>

        <?php
        /*
         * author: OUTMANE BOUHOU
         * Fecha: 09/11/2021
         * description: 3.Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.
         */


        /* usar la libreria de validacion */
        require_once '../core/210322ValidacionFormularios.php';

        /* Llamar al fichero de configuracion de base de datos */
        require_once '../config/confDBPDO.php';

        /* definir un variable constante obligatorio a 1 */
        define("OBLIGATORIO", 1);

        /* Variable de entrada correcta inicializada a true */
        $entradaOK = true;

        /* definir un array para alamcenar errores del codeDep,description y salary */
        $aErrores = ["codeDep" => null,
            "description" => null,
            "salary" => null
        ];

        /* Array de respuestas inicializado a null */
        $aRespuestas = ["codeDep" => null,
            "description" => null,
            "salary" => null
        ];

        /* Establecemos la connection con pdo en global */
        $miDB = new PDO(HOST, USER, PASSWORD);

        /* configurar las excepcion */
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        /* comprobar si ha pulsado el button enviar */
        if (isset($_REQUEST['submitbtn'])) {
            //Para cada campo del formulario: Validamos la entrada y actuar en consecuencia
            //Validar entrada
            //Comprobar si el campo codeDep esta rellenado
            $aErrores["codeDep"] = validacionFormularios::comprobarAlfabetico($_REQUEST['codeDep'], 3, 3, OBLIGATORIO);

            //Comprobar si el campo description  esta rellenado 
            $aErrores["description"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['description'], 1000, 10, OBLIGATORIO);

            //Comprobar si el campo salary  esta rellenado 
            $aErrores["salary"] = validacionFormularios::comprobarFloat($_REQUEST['salary'], 10000, 1, OBLIGATORIO);

            if (!$aErrores["codeDep"]) {
                /* comprobamos si el codigo existe en la base de datos */
                try {
                    $sql = "SELECT CodDepartamento from Departamento where CodDepartamento='" . $_REQUEST['codeDep'] . "'";
                $resultadoConsulta = $miDB->query($sql);

                /* Si existe mostramos el error que esta */
                if ($resultadoConsulta->rowCount() > 0) {
                    $aErrores['codeDep'] = "Ya existe ese código";
                }
                    
                } catch (PDOException $exception) {
                /* Si hay algun error el try muestra el error del codigo */
                echo '<span> Codigo del Error :' . $exception->getCode() . '</span> <br>';

                /* Muestramos su mensage de error */
                echo '<span> Error :' . $exception->getMessage() . '</span> <br>';
            } finally {
                /* Ceramos la connection */
                unset($miDB);
            }
                
            }



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

                        /* insertamos los valores que hemos cogido desde el formolario */
                        $insert = ' INSERT INTO Departamento(CodDepartamento,DescDepartamento,FechaBaja,VolumenNegocio) VALUES ("' . $aRespuestas['codeDep'] . '","' . $aRespuestas['description'] . '", null,"' . $aRespuestas['salary'] . '")';
                        $numRegistros = $miDB->exec($insert);

                        /* mostrar el numero de registros que hemos seleccionado */
                        echo '
                            <div class="w3-panel w3-green">
                            <h3>Success!</h3>
                            <p>Se ha insertado  ' . $numRegistros . ' nuevo registro.</p>
                            </div>';

                        /* Seleccionamos toda la tabla ademas el nuevo registro */
                        $sql = 'SELECT * FROM Departamento';

                        /* usar las consultas preparadas */
                        $resultadoConsulta = $miDB->prepare($sql);
                        $resultadoConsulta->execute();

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
                        ?>
                    </table>
                </div><?php
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
                        <tr>
                            <!--El campo codeDep obligatorio -->
                            <td><label>Código del Departamento (*)   :</label></td>
                            <td> <input type="text" name="codeDep" value="<?php echo (isset($_REQUEST['codeDep']) ? $_REQUEST['codeDep'] : null); ?>"/></td>
                            <td><span><?php echo ($aErrores["codeDep"] != null ? $aErrores['codeDep'] : null); ?></span></td>
                        </tr>

                        <!--El campo description obligatorio -->
                        <tr>
                            <td><label>Descripción(*)   :</label></td>
                            <td><input type="text"  name="description" value="<?php echo (isset($_REQUEST['description']) ? $_REQUEST['description'] : null); ?>"/></td>
                            <td><span><?php echo ($aErrores["description"] != null ? $aErrores['description'] : null); ?></span></td>
                        </tr>

                        <!--El campo salary -->
                        <tr>
                            <td> <label>Volumen del negocio (*) :</label></td>
                            <td> <input type="text"  name="salary" value="<?php echo (isset($_REQUEST['salary']) ? $_REQUEST['salary'] : null); ?>"/></td>
                            <td> <span><?php echo ($aErrores["salary"] != null ? $aErrores['salary'] : null); ?></span></td>
                        </tr>

                        <tr> 
                            <td></td>
                            <td><input type="submit" class="w3-btn w3-teal" name="submitbtn" value="Enviar datos"/><input type="reset" class="w3-btn w3-red" name="resetbtn" value="Borrar datos"/></td>
                        </tr>
                    </form>
                </table>

            </div>
            <?php
        }
        ?>



    </body>
</html>



