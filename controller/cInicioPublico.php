<?php


    /**
     * Controlador que contiene la vista de Inicio Publico 
     *   y controla a que pagina va en funcion del submit que se pulse
     * 
     * @author Sonia Anton Llanes
     * @created 21/01/2022
     * @updated: 25/01/2021
     */


     //Si pulso en el boton Log IN
    if (isset($_REQUEST['log'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso']; //
        $_SESSION['paginaEnCurso']='login';  //cambio la sesion de pagina a LogIN
        header('Location: index.php');  //recargo el fichero index.php
            exit;
    } 
    
    $_SESSION['paginaEnCurso']='inicioPublico';  //Inicio sesion de pagina para ver la vista inicioPublico
    
    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout
    
    