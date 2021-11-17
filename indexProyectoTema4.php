<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Outmane Bouhou :proyectoTema4</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="webroot/css/footer.css"/>
        <link rel="stylesheet" href="webroot/css/style.css"/>
    </head>
    <body>
        <div class="container mt-3">
            <h2></h2>
            <p></p>            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Enunciado</th>
                        <th>PDO</th>
                        <th>CodigoPDO</th>
                        <th>MYSQLI</th>
                        <th>CodigoMYSQLI</th>
                    </tr>
                </thead>
                <tbody>
                    <!--Mostrar codigo de scripts-->
                    <tr>
                        <td>1. (ProyectoTema4) Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</td> 
                        <td><a href="codigoPHP/ejercicio1.0.php"><img src="webroot/media/icons/blue.png" alt="runIcon"></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio1.0.php"><img src="webroot/media/icons/orange.png" alt="runIcon"></a></td>
                        <td><a href="codigoPHP/ejercicio1.1.php"><img src="webroot/media/icons/jouer.png" alt="runIcon"></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio1.1.php"><img src="webroot/media/icons/red.png" alt="runIcon"></a></td>
                    </tr>

                    <tr>
                        <td>2. Mostrar el contenido de la tabla Departamento y el número de registros.</td>
                        <td><a href="codigoPHP/ejercicio2.0.php"><img src="webroot/media/icons/blue.png" alt="runIcon"></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio2.0.php"><img src="webroot/media/icons/orange.png" alt="runIcon"></a></td>
                        <td><a href="codigoPHP/ejercicio2.1.php"><img src="webroot/media/icons/jouer.png" alt="runIcon"></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio2.1.php"><img src="webroot/media/icons/red.png" alt="runIcon"></a></td>
                    </tr>

                    <tr>
                        <td>3. Formulario para añadir un departamento a la tabla Departamento con validación de entrada y
                            control de errores.</td>
                        <td><a href="codigoPHP/ejercicio3.0.php"><img src="webroot/media/icons/blue.png" alt="runIcon"></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio3.0.php"><img src="webroot/media/icons/orange.png" alt="runIcon"></a></td>

                    </tr>

                    <tr>
                        <td>4. Formulario   de   búsqueda   de   departamentos   por   descripción   (por   una   parte   del   campo
                            DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos).</td>
                        <td><a href="codigoPHP/ejercicio4.0.php"><img src="webroot/media/icons/blue.png" alt="runIcon"></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio4.0.php"><img src="webroot/media/icons/orange.png" alt="runIcon"></a></td>

                    </tr>

                    <tr>
                        <td> 5. Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones
                            insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.</td>
                        <td><a href="codigoPHP/ejercicio5.0.php"><img src="webroot/media/icons/blue.png" alt="runIcon"></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio5.0.php"><img src="webroot/media/icons/orange.png" alt="runIcon"></a></td>

                    </tr>

                    <tr>
                        <td>6. Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos
                            utilizando una consulta preparada. (Después de programar y entender este ejercicio, modificar los
                            ejercicios anteriores para que utilicen consultas preparadas). Probar consultas preparadas sin bind,
                            pasando los parámetros en un array a execute.</td>
                        <td><a href="codigoPHP/ejercicio6.0.php"><img src="webroot/media/icons/blue.png" alt="runIcon"></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio6.0.php"><img src="webroot/media/icons/orange.png" alt="runIcon"></a></td>

                    </tr>
                    <tr>
                        <td>7. XML - Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla
                            Departamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en el
                            directorio .../tmp/ del servidor.</td>
                        <td><a href="codigoPHP/ejercicio7xml.php"><img src="webroot/media/icons/blue.png" alt="runIcon"></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio7xml.php"><img src="webroot/media/icons/orange.png" alt="runIcon"></a></td>
                    </tr>
                    <tr>
                        <td>7. USANDO JSON </td>
                        <td><a href="codigoPHP/ejercicio7json.php"><img src="webroot/media/icons/blue.png" alt="runIcon"></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio7json.php"><img src="webroot/media/icons/orange.png" alt="runIcon"></a></td>
                    </tr>
                    <tr>
                        <td>8. Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un
                            fichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR). El fichero exportado se
                            encuentra en el directorio .../tmp/ del servidor.
                            Si el alumno dispone de tiempo probar distintos formatos de importación - exportación: XML,
                            JSON, CSV, TXT,...
                            Si el alumno dispone de tiempo probar a exportar e importar  a o desde un directorio (a elegir) en
                            el equipo cliente.</td>
                        <td><a href="codigoPHP/ejercicio8xml.php"><img src="webroot/media/icons/blue.png" alt="runIcon"></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio8xml.php"><img src="webroot/media/icons/orange.png" alt="runIcon"></a></td>
                    </tr>
                    <tr>
                        <td>8. USANDO JSON</td>
                        <td><a href="codigoPHP/ejercicio8json.php"><img src="webroot/media/icons/blue.png" alt="runIcon"></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio8json.php"><img src="webroot/media/icons/orange.png" alt="runIcon"></a></td>
                    </tr>
                    <tr>
                        <td>9. Aplicación resumen MtoDeDepartamentosTema4. (Incluir PHPDoc y versionado en el repositorio
                            GIT</td>
                        <td><a href="../202DWESMtoproyectoTema4/indexMtoproyectoTema4.php"><img src="webroot/media/icons/blue.png" alt="runIcon"></a></td>
                 
                    </tr>


                </tbody>
            </table>
        </div>
        <footer class="bg-dark text-center text-white">
            <!-- Grid container -->
            <div class="container p-3 pb-0">
                <!-- Section: Social media -->
                <section class="mb-3">
                    <!-- Github -->
                    <a class="btn btn-outline-light btn-floating m-1"  href="https://github.com/outmaneBH/202DWESproyectoTema4" target="_blank"  role="button">
                        <img id="git" style="width: 30px" src="webroot/media/icons/git.png" alt="github"/>  
                    </a>
                </section>

            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                Copyrights © 2021 
                <a class="text-white"   href="https://github.com/outmaneBH/202DWESproyectoTema4" target="_blank" >OUTMANE BOUHOU</a>
                . All rights reserved.
            </div>
            <!-- Copyright -->
        </footer>
    </body>
</html>


