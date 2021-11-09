<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio3.0 PDO</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <?php
//usar la libreria de validacion
        require_once '../core/210322ValidacionFormularios.php';

//definir un variable constante obligatorio a 1
        define("OBLIGATORIO", 1);
    


//Varible de entrada correcta inicializada a true
        $entradaOK = true;

//definir un array para alamcenar errores del nombre y la altura
        $aErrores = ["alfabetico" => null,
            "opalfabetico" => null,
            "entero" => null];
        ?>
        <table>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <tr>
                    <!--El campo alfabetico obligatorio -->
                    <td><label>Campo alfabetico (*)   :</label></td>
                    <td> <input type="text" name="alfabetico" value="<?php echo (isset($_REQUEST['alfabetico']) ? $_REQUEST['alfabetico'] : null); ?>"/></td>
                    <td><span><?php echo ($aErrores["alfabetico"] != null ? $aErrores['alfabetico'] : null); ?></span></td>
                </tr>
                <tr>
                    <!--El campo alfabetico obligatorio -->
                    <td><label>Campo alfabetico (*)   :</label></td>
                    <td> <input type="text" name="alfabetico" value="<?php echo (isset($_REQUEST['alfabetico']) ? $_REQUEST['alfabetico'] : null); ?>"/></td>
                    <td><span><?php echo ($aErrores["alfabetico"] != null ? $aErrores['alfabetico'] : null); ?></span></td>
                </tr>
                <tr>
                    <!--El campo alfabetico obligatorio -->
                    <td><label>Campo alfabetico (*)   :</label></td>
                    <td> <input type="text" name="alfabetico" value="<?php echo (isset($_REQUEST['alfabetico']) ? $_REQUEST['alfabetico'] : null); ?>"/></td>
                    <td><span><?php echo ($aErrores["alfabetico"] != null ? $aErrores['alfabetico'] : null); ?></span></td>
                </tr>

                <tr> 
                    <td><input type="submit" class="w3-btn w3-teal" name="submitbtn" value="Enviar datos"/></td>
                </tr>
            </form>
        </table>

    </body>
</html>



