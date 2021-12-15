<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ejercicio8 - PDO</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
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
            $sql = "SELECT * FROM Departamento";
            $consulta = $miDB->prepare($sql);
            $consulta->execute();
            

            $xmlfile = new DOMDocument();
            
            /*formtear la salida de el ficher xml*/
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
            $xmlfile->save('../tmp/tablaDepartamento.xml');
            echo '          <div class="w3-panel w3-blue">
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