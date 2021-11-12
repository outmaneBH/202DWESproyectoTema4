<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio8 - PDO</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>

        </style>
    </head>
    <body>
        <?php
        /*
         * author: OUTMANE BOUHOU
         * Fecha: 11/11/2021
         * description:8.Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla
          Departamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en el
          directorio .../tmp/ del servidor.
         */
        require_once "../config/confDBPDO.php";
        try {
            /* Establecemos la connection con pdo */
            $miDB = new PDO(HOST, USER, PASSWORD);

            /* configurar las excepcion */
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            /* Seleccionamos toda la tabla y preparamos la consulta y ejecutamos */
            $sql = "SELECT * from Departamento";
            $consulta = $miDB->prepare($sql);
            $consulta->execute();

            $xmlfile = new DOMDocument("1.0");
            $xmlfile->formatOutput = true;

            /* Creamos el raiz departamentos en el fichero xml */
            $Departamentos = $xmlfile->appendChild($xmlfile->createElement("Departamentos"));

            /* quedarnos en el primer registro */
            $registro = $consulta->fetchObject();

            //recorremos los registros con  while*/
            while ($registro) {
                /* empezamos a crear la etequieta deparatmento hija del raiz */
                $Departamento = $Departamentos->appendChild($xmlfile->createElement("Departamento"));

                $Departamento->appendChild($xmlfile->createElement("CodDepartamento", $registro->CodDepartamento));
                $Departamento->appendChild($xmlfile->createElement("DescDepartamento", $registro->DescDepartamento));
                $Departamento->appendChild($xmlfile->createElement("FechaBaja", $registro->FechaBaja));
                $Departamento->appendChild($xmlfile->createElement("VolumenNegocio", $registro->VolumenNegocio));
                
                /*El seguinte registro*/
                $registro = $consulta->fetchObject();
            }
            /*finalmente exportamos el fichero al ../tmp/tablaDepartamento.xml */
            $xmlfile->save("../tmp/tablaDepartamento.xml");
            echo '
                            <div class="w3-panel w3-blue">
                            <h3>Information!</h3>
                            <p>Se ha insertado todo bien.</p>
                            </div>';
        } catch (PDOException $excepcion) { //Código que se ejecutará si se produce alguna excepción
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