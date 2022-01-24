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
        <meta charset="utf-8">
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
    </head>
    
    <body class="container">

	<main class="main">
                <div class="header">
                    <h2 class="centrado"><a href="../../proyectoDWES/indexProyectoDWES.php" style="border-bottom: 2px solid black; color:black;">DWES</a> -
                        Proyecto FINAL Login Logout Multicapa POO</h2> 
                </div>
            
                <?php require_once $vistas[$_SESSION['pagina']]; ?>
            
        </main>
        
        <footer class="footer">
            <nav class="fnav">
                <ul>
                    <li class="ftexto"><a href="../index.html">&copy 2021-22. Sonia Anton LLanes </a></li>
                    <li>                       
                        <a class="maxMedia" href="doc/curriculum_SALL.pdf" target="_blank"><img src="webroot/images/CV.png" alt="imagen_CV"></a>
                        <a class="maxMedia" href=""><img src="webroot/images/linkedin.png" alt="imagen_linkedIn"></a>
                        <a class="maxMedia" href="https://github.com/SoniaALLSauces/AplicacionLoginLogoutMulticapa.git" target="_blank"><img src="webroot/images/github.png" alt="imagen_github"></a>
                    </li>
                </ul>
            </nav>
        </footer>  
        
    </body>
</html>