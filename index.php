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
        require_once $controladores[$_SESSION['pagina']];  //cuando existe una sesion, abro el controlador que hay en la variable
    } else{
        require_once $controladores['inicioPublico'];  //cuando es la primera vez que entro y no hemos iniciado sesion abro el controlador del login
    }