<?php


    /**
     * @author Sonia Anton Llanes
     * @created 22/12/2021
     * @updated: 13/01/2021
     */


    if (isset($_REQUEST['log'])){
        $_SESSION['paginaAnterior']=$_SESSION['pagina']; //
        $_SESSION['pagina']='login';  //cuando existe una sesion, abro el controlador que hay en la variable
        header('Location: index.php');  //recargo el fichero index.php
            exit;
    } else{
        $_SESSION['pagina']='inicioPublico';  //cuando es la primera vez que entro y no hemos iniciado sesion abro el controlador del login
    }
        

    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout