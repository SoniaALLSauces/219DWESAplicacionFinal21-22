<?php

    /**
     * LAYOUT proyecto Login Logout Final 2021/22: ventana con el html header, main con la pagina en curso a mostrar indicada por $_SESSION('pagina') y footer
     * 
     * @author  Sonia Anton Llanes
     * @created  24/01/2022
     * @updated  24/01/2022
     */


    //Importamos todos los archivos necesarios
        require_once 'config/confApp.php'; //archivo que contiene todos los archivos y los arrays de archivos para que funcione la aplicacion
   
?>




<html lang="es">
    <head>
        <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
<!--        <meta charset="utf-8">-->
        <title>Sonia Anton Llanes - Login Logout FINAL</title>
        <meta name="author" content="Sonia Antón Llanes">
        <meta name="description" content="Proyecto LogIn LogOut FINAL">
        <meta name="keywords" content="">
        <link href="webroot/css/style.css" rel="stylesheet" type="text/css">
        <link href="webroot/images/mariposa_vintage.png" rel="icon" type="image/png">	
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
        <script type="text/JavaScript" src="webroot/js/scriptMenuUsuario.js"></script>
    </head>
    
    <body class="container">
        
<!--        <header class="header">
            <a href="../../index.html">
                <img src="webroot/images/logo.png" alt="logo" height="55vh">
            </a>
            <h2>Proyecto FINAL</h2> 
        </header>-->

	<main class="main gato">

                <?php require_once $vistas[$_SESSION['paginaEnCurso']]; ?>
            
        </main>
        
        <footer class="footer">
            <nav class="fnav">
                <ul>
                    <li class="ftexto"><a href="../index.html">&copy 2021-22. Sonia Anton LLanes </a></li>
                    <li>                       
                        <a class="maxMedia" href="doc/curriculum_SALL.pdf" target="_blank"><img src="webroot/images/CV.png" alt="imagen_CV"></a>
                        <a class="maxMedia" href=""><img src="webroot/images/linkedinIcon.png" alt="imagen_linkedIn"></a>
                        <a class="maxMedia" href="https://github.com/SoniaALLSauces/219DWESAplicacionFinal21-22.git" target="_blank"><img src="webroot/images/githubIcon.jpg" alt="imagen_github"></a>
                        <a class="maxMedia" href="doc/phpdoc/index.html" target="_blank"><img src="webroot/images/phpdoc.png" alt="phpdoc"></a>
                        <a class="maxMedia" href="indexTecnologias.php" target="_blank"><img src="webroot/images/tecnologias.png" alt="tecnologias"></a>
                    </li>
                </ul>
            </nav>
        </footer>  
        
    </body>

</html>