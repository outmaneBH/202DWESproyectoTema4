<!DOCTYPE html>
<html lang="en">
    <head>
        <title>OB:Proyecto Tema 4</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="webroot/css/style.css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="icon" href="webroot/media/icons/fav.png" type="image/ico" sizes="16x16">
        <style>
            p{
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container mt-3">
            <div class="w3-bar w3-black">
                <a href="/index.html" class="w3-bar-item w3-button w3-mobile w3-hover-blue" style="width:33%">Home</a>
                <a href="#" class="w3-bar-item w3-button w3-mobile w3-blue w3-hover-blue" style="width:33%">Proyecto Tema   4 </a>
            </div>
            <div class="w3-bar w3-light-grey">
                <!--1&1-->
                <div class="w3-dropdown-hover">
                    <button class="w3-button">Datos 1$1</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4 ">
                        <a href="scriptDB/CreaDB202DWESProyectoTema4-1&1.php" class="w3-bar-item w3-button w3-hover-blue">Create</a>
                        <a href="mostrarcodigo/muestraCodigocreate1&1.php" class="w3-bar-item w3-button w3-hover-red">Codigo Create</a>
                        <a href="scriptDB/CargaInicialDB202DWESProyectoTema4-1&1.php" class="w3-bar-item w3-button w3-hover-blue">Insert</a>
                        <a href="mostrarcodigo/muestraCodigoinsert1&1.php" class="w3-bar-item w3-button w3-hover-red">Codigo Insert</a>
                        <a href="scriptDB/BorraDB202DWESProyectoTema4-1&1.php" class="w3-bar-item w3-button w3-hover-blue">Delete</a>
                        <a href="mostrarcodigo/muestraCodigodelete1&1.php" class="w3-bar-item w3-button w3-hover-red">Codigo Delete</a>
                    </div>
                </div>
                <!--Desarollo-->
                <div style="margin-left: 40px;" class="w3-dropdown-hover">
                    <button class="w3-button">Datos Desarollo</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4">
                        <a href="mostrarcodigo/muestraCodigocreate.php" class="w3-bar-item w3-button w3-hover-red">Codigo Create</a>
                        <a href="mostrarcodigo/muestraCodigoinsert.php" class="w3-bar-item w3-button w3-hover-red">Codigo Insert</a>
                        <a href="mostrarcodigo/muestraCodigodelete.php" class="w3-bar-item w3-button w3-hover-red">Codigo Delete</a>
                    </div>
                </div>
            </div>

            <!-- <div class="w3-col s6 w3-center">
                 <div class="w3-bar">
                     <p>Configuration daw202.sauces.local </p>
                     <a href="#" ><button disabled class="w3-bar-item w3-button w3-indigo" style="width:33.3%">Create</button></a>
                     <a href="#" ><button disabled class="w3-bar-item w3-button w3-cyan" style="width:33.3%">Insert </button></a>
                     <a href="#" ><button  disabled class="w3-bar-item w3-button w3-brown" style="width:33.3%">Delete </button></a>
                 </div>
             </div>
             <div class="w3-col s6 w3-center">
                 <div class="w3-bar">
                     <p>Configuration 1&1</p>
                     <a href="scriptDB/CreaDB202DWESProyectoTema4-1&1.php" ><button class="w3-bar-item w3-button w3-indigo" style="width:33.3%">Create</button></a>
                     <a href="scriptDB/CargaInicialDB202DWESProyectoTema4-1&1.php" ><button class="w3-bar-item w3-button w3-cyan" style="width:33.3%">Insert</button></a>
                     <a href="scriptDB/BorraDB202DWESProyectoTema4-1&1.php" ><button class="w3-bar-item w3-button w3-brown" style="width:33.3%">Delete</button></a>
                 </div>
             </div>-->
            <h2></h2>
            <p></p>            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Enunciado</th>
                        <th>PDO</th>
                        <th>CodigoPDO</th>
                        <th>MYSQLI</th>
                        <th>CodigoM.</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1. (ProyectoTema4) Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</td>
                        <td><a href="codigoPHP/ejercicio1.0.php"><img src="webroot/media/icons/blue.png" alt="runIcon"></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio1.0.php"><img src="webroot/media/icons/orange.png" alt="runIcon"></a></td>

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
                        <td><a href="../202DWESMtoDepartamentosTema4/indexMtoproyectoTema4.php"><img src="webroot/media/icons/blue.png" alt="runIcon"></a></td>

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
                    <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/outmaneBH/202DWESproyectoTema4" target="_blank"role="button">
                        <img id="git" style="width: 30px" src="webroot/media/icons/git.png" alt="github"/>  
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


