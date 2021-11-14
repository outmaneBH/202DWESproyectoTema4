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
         * Fecha: 14/11/2021
         * description:Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla
          Departamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en el
          directorio .../tmp/ del servidor.
         */
        /* añadimos la configuracion para acceder ala base de datos */
        require_once "../config/confDBPDO.php";

        try {
            /* los datos of connection */
            $miDB = new PDO(HOST, USER, PASSWORD);

            /* Cambiar los errores y meter estos datos */
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            /* Insertamos los valores de la tabla departamento */
            $sql = <<<OB
                        INSERT INTO Departamento VALUES 
                        (:CodDepartamento, :DescDepartamento, :FechaBaja, :VolumenNegocio);
                OB;

            /* preparamos la consulta */
            $Consulta = $miDB->prepare($sql);

            /* Iniciamos the transaction */
            $miDB->beginTransaction();

            /* Iniciamos el fichero xml */
            $xmlfile = new DOMDocument("1.0");
            $xmlfile->formatOutput = true;

            /* Cragamos el fichero xml de la tabla departamento */
            $xmlfile->load('../tmp/tablaDepartamento.xml');

            /* sacamos el nodo deparatmento del fichero xml */
            $nodeDepartamento = $xmlfile->getElementsByTagName('departamento');

            /* Recorremos el fichero xml con los datos de cada tagname codigo y la descripcion y fechade baja mas el volumen de nogocio */
            foreach ($nodeDepartamento as $departamento) {
                $codDepartamento = $departamento->getElementsByTagName('codDepartamento')->item(0)->nodeValue;
                $descDepartamento = $departamento->getElementsByTagName('descDepartamento')->item(0)->nodeValue;

                $fechaBaja = ($departamento->getElementsByTagName('fechaBaja')->item(0)->nodeValue) == '' ? null : $fechaBaja;
                $volumenNegocio = $departamento->getElementsByTagName('volumenNegocio')->item(0)->nodeValue;

                $Consulta->bindParam(':codDepartamento', $codDep);
                $Consulta->bindParam(':descDepartamento', $descDep);
                $Consulta->bindParam(':fechaBaja', $fechaBaja);
                $Consulta->bindParam(':volumenNegocio', $volNeg);

                /* ejecutamos la consulta */
                $Consulta->execute();
            }
            /* hagamos el comit si todo ha ido bien */
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
    </body>
</html>