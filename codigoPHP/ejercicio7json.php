<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio7 - PDO</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
            /* los datos of connection */
            $miDB = new PDO(HOST, USER, PASSWORD);

            /* Cambiar los errores y meter estos datos */
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = <<<OB
                    INSERT INTO Departamento VALUES
                    (:codDepartamento, :descDepartamento, :fechaBaja, :volumenNegocio);
            OB;
            $Consulta = $miDB->prepare($sql);
            $jsonFile = file_get_contents('../tmp/tablaDepartamento.json');


            $Departamentos = json_decode($jsonFile);


            foreach ($Departamentos as $Departamento) {
                $Consulta->bindParam(':codDepartamento', $Departamento->codDepartamento);
                $Consulta->bindParam(':descDepartamento', $Departamento->descDepartamento);
                $Consulta->bindParam(':fechaBaja', $Departamento->fechaBaja);
                $Consulta->bindParam(':volumenNegocio', $Departamento->volumenNegocio);

                $Consulta->execute();
            }

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
    </body>
</html>