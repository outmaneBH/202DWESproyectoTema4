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
         * Fecha: 10/11/2021
         * description:Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla
          Departamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en el
          directorio .../tmp/ del servidor.
         */
        /* Llamar al fichero de configuracion de base de datos */
        require '../config/confDBPDO.php';
        try {
            /* Establecemos la connection con pdo */
            $miDB = new PDO(HOST, USER, PASSWORD);

            /* configurar las excepcion */
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $sql = <<< OB
                Insert into Departamento values
                (:CodDepartamento, :DescDepartamento, :FechaBaja, :VolumenNegocio);
        OB;

            /* llamamos al fichero xml */
            $tablaDepartamento = simplexml_load_file('../tmp/tablaDepartamento.xml');

            foreach ($tablaDepartamento as $tabladepartamento) {
                //Preparamos la consulta con prepare
                $consulta = $miDB->prepare($sql);
                $aDepartamentos = [["CodDepartamento" => $tabladepartamento["CodDepartamento"],
                "DescDepartamento" => $tabladepartamento["DescDepartamento"],
                "FechaBaja" => $tabladepartamento["FechaBaja"],
                "VolumenNegocio" => $tabladepartamento["VolumenNegocio"]]];
                $consulta->execute($aDepartamentos);
            }
            foreach ($aDepartamentos as $deparatemento) {
                $aPrametros = [[":CodDepartamento" => $deparatemento["CodDepartamento"]],
                    [":DescDepartamento" => $deparatemento["DescDepartamento"]],
                    [":FechaBaja" => $deparatemento["FechaBaja"]],
                    [":VolumenNegocio" => $deparatemento["VolumenNegocio"]]
                ];
                $consulta->execute($aPrametros);
            }
            
             echo '
                           <div class="w3-panel w3-blue">
                            <h3>Information!</h3>
                            <p>La importacion esta bien.</p>
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
    </body>
</html>