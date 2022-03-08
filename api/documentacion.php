<?php

    /**
     * Documentación de la api rest propia: http://daw219.ieslossauces.es/219DWESAplicacionFinal21-22/api/consultaDepartamentoPorCodigo.php?codDepartamento=valor
     * 
     * @author  Sonia Anton Llanes
     * @created  10/02/2022
     * @updated  10/02/2022
     */

?>




<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Sonia Anton Llanes - Login Logout FINAL</title>
        <meta name="author" content="Sonia Antón Llanes">
        <meta name="description" content="Proyecto LogIn LogOut FINAL">
        <meta name="keywords" content="">
        <link href="../webroot/css/style.css" rel="stylesheet" type="text/css">
        <link href="../webroot/images/mariposa_vintage.png" rel="icon" type="image/png">	
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
        <script type="text/JavaScript" src="webroot/js/scriptMenuUsuario.js"></script>
        <style>
            .api{display: none;}
            .apis:hover{width: 600px;
                        margin-left: 20px;
                        background: #ecaaa1;}
        </style>
    </head>
    
    <body class="container">
        
        <header class="header">
            <a href="../../index.html">
                <img src="../webroot/images/logo.png" alt="logo" height="55vh">
            </a>
            <h2>Proyecto FINAL</h2> 
            <h2 style="width:50vw; color:black; margin:0 auto">Documentación APIs REST Propias</h2>
        </header>

	<main class="main documentacion">
            
            <h3 class="apis" onclick="displayBlock(0)">Documentación API Consulta Departamento Por Código</h3>
            <section class="api">
                <article>
                    <div class="enun">Llamada a la API</div>
                    <div class="desc">
                        <p style='font-weight: bold'>http://daw219.ieslossauces.es/219DWESAplicacionFinal21-22/api/consultaDepartamentoPorCodigo.php?codDepartamento=valor</p>
                        <p>Llamamos a la api busqueda de departamentos a traves de la url indicada. </p>
                        <p>Siendo 'valor' el código del departamento introducido por parámetro. 
                        Este código son tres letras alfabéticas mayúsculas.</p>
                    </div>
                </article>
                <article>
                    <div class="enun">Ejemplo de respuesta de la API</div>
                    <div class="desc">
                        <p>La solicitud de API con exito devuelve en formato json los datos del departamento que corresponden al código introducido,
                            incluyendo información de su descripción, la fecha de alta y/o baja y su volumen de negocio. Asi como el ejemplo:</p>
                        <p class="ejem">{"respuesta":true,"codigo":"CON","descripcion":"Departamento de contabilidad","fechaAlta":"2022-01-20 12:58:34","fechaBaja":null,"volumenNeg":"3"}</p>
                    </div>
                </article>
                <article>
                    <div class="enun">Error en la solicitud a la API</div>
                    <div class="desc">
                        <p>Cuando falla una solicitud de API devolverá un objeto de error en formato JSON, asi como en el ejemplo:</p>
                        <p class="ejem">{"respuesta":false,"mensaje":"departamento no encontrado en base de datos"}</p>
                </div>
                </article>
                <article class="separacion"></article>
            </section>
            
            <h3 class="apis" onclick="displayBlock(1)">Documentación API Consulta Usuario Por Descripción</h3>
            <section class="api">
                <article>
                    <div class="enun">Llamada a la API</div>
                    <div class="desc">
                        <p style='font-weight: bold'>https://daw219.ieslossauces.es/219DWESAplicacionFinal21-22/api/consultaUsuarioPorDescripcion.php?descUsuario=valor</p>
                        <p>Llamamos a la api busqueda de usuarios a traves de la url indicada. </p>
                        <p>Siendo 'valor' parte o todo el nombre del usuario introducido por parámetro, 
                        para la búsqueda de todos los usuarios que coincidan con dicho parámetro.</p>
                    </div>
                </article>
                <article>
                    <div class="enun">Ejemplo de respuesta de la API</div>
                    <div class="desc">
                        <p>La solicitud de API con exito devuelve en formato json los datos del/de los usuario/s que corresponden al parámetro introducido,
                            incluyendo información de su nombre y apellidos, fecha de la última conexión, número de conexiones... Asi como el ejemplo:</p>
                        <p class="ejem">[{"respuesta":true,"codigo":"david","descripcion":"David","numConexiones":"3","ultimaConexion":"1646384565","perfil":"usuario","imagen":null}]</p>
                    </div>
                </article>
                <article>
                    <div class="enun">Error en la solicitud a la API</div>
                    <div class="desc">
                        <p>Cuando falla una solicitud de API devolverá un objeto de error en formato JSON, asi como en el ejemplo:</p>
                        <p class="ejem">{"respuesta":false,"mensaje":"no se ha encontrado ningun usuario con esa descripcion"}</p>
                </div>
                </article>
                <article class="separacion"></article>
            </section>
            
            <h3 class="apis" onclick="displayBlock(2)">Documentación API Validar DNI</h3>
            <section class="api">
                <article>
                    <div class="enun">Llamada a la API</div>
                    <div class="desc">
                        <p style='font-weight: bold'>https://daw219.ieslossauces.es/219DWESAplicacionFinal21-22/api/validarDNI.php?dni=valor</p>
                        <p>Llamamos a la api validar DNI a traves de la url indicada. </p>
                        <p>Siendo 'valor' el DNI introducido por parámetro, para comprobar con nuestra libreriaValidacion si es un DNI válido.</p>
                        <p>El DNI introducido por parámetro deben ser 8 cifras numéricas y una letra mayúscula</p>
                    </div>
                </article>
                <article>
                    <div class="enun">Ejemplo de respuesta de la API</div>
                    <div class="desc">
                        <p>La solicitud de API con exito devuelve en formato json el DNI introducido y un mensaje de DNI validado.
                            Asi como el ejemplo:</p>
                        <p class="ejem">{"respuesta":true,"dni":"12345678Z","mensaje":"DNI Validado"}</p>
                    </div>
                </article>
                <article>
                    <div class="enun">Error en la solicitud a la API</div>
                    <div class="desc">
                        <p>Cuando falla una solicitud de API devolverá un objeto de error en formato JSON, asi como en el ejemplo:</p>
                        <p class="ejem">{"respuesta":false,"dni":"12345678a","mensaje":"DNI No Valido"}</p>
                </div>
                </article>
                <article class="separacion sepFinal"></article>
            </section>
            
            <script>
                function displayBlock(num){
                    var arrayApys= document.getElementsByClassName("api");
                    for (let i=0; i<arrayApys.length; i++){
                        arrayApys[i].style.display= "none";
                    }
                    arrayApys[num].style.display= "block";
                }
            </script>
                
            
        </main>
        
        <footer class="footer">
            <nav class="fnav">
                <ul>
                    <li class="ftexto"><a href="../../index.html">&copy 2021-22. Sonia Anton LLanes </a></li>
                    <li>                       
                        <a class="maxMedia" href="../doc/curriculum_SALL.pdf" target="_blank"><img src="../webroot/images/CV.png" alt="imagen_CV"></a>
                        <a class="maxMedia" href=""><img src="../webroot/images/linkedin.png" alt="imagen_linkedIn"></a>
                        <a class="maxMedia" href="https://github.com/SoniaALLSauces/219DWESAplicacionFinal21-22.git" target="_blank"><img src="../webroot/images/github.png" alt="imagen_github"></a>
                        <a class="maxMedia" href="../indexTecnologias.php" target="_blank"><img src="../webroot/images/tecnologias.png" alt="tecnologias"></a>
                    </li>
                </ul>
            </nav>
        </footer>  
        
    </body>
</html>