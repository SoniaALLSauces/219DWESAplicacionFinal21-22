<?php


    /**
     * @author Sonia Anton Llanes
     * @created 21/01/2022
     * @updated: 21/01/2022
     */


//Importamos todos los archivos necesarios para index
    require_once 'config/confApp.php'; //archivo que contiene todos los archivos y los arrays de archivos necesarios

//Iniciamos Sesion
    session_start();

    
//Requerimos que se cargue el controlador según si se ha iniciado sesión de página o no
    if(isset($_SESSION['pagina'])){
//        require_once $controladores[$_SESSION['pagina']];
        if (isset($_SESSION['usuario219DWESAplicacionFinal']) || $_SESSION['usuario219DWESAplicacionFinal']!=null){
            require_once $controladores[$_SESSION['pagina']];  //cuando existe una sesion, abro el controlador que hay en la variable
        } else if ($_SESSION['pagina']=='inicioPublico' || $_SESSION['pagina']=='login' || $_SESSION['pagina']=='registro'){
            require_once $controladores[$_SESSION['pagina']];  //cuando existe una sesion de pagina, pero no un usuario logeado, abro el controlador de la pagina publica correspondiente
        } else{
            require_once $controladores['inicioPublico'];  //si se intenta entrar en pagina privada sin logearse te lleva a inicioPublico
        }
        
    } else{
        require_once $controladores['inicioPublico'];  //cuando es la primera vez que entro y no hemos iniciado sesion abro el controlador del inicio Publico
    }