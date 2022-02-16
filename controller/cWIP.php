<?php

    /**
     * Controlador que contiene la vista de Work In Progress  
     *   muestra una imagen cuando aun esta pendiente de realizar esta parte del programa
     * 
     * @author Sonia Anton Llanes
     * @created 27/01/2022
     * @updated: 27/01/2021
     */

    
    //Si pulso en volver:
        if (isset($_REQUEST['volver'])){
            $paginaActual=$_SESSION['paginaEnCurso'];     //guardo la pagina actual en una variable, por si queremos volver
            $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior']; //cambio el valor de la pagina actual a la que teniamos guardada en anterior
            $_SESSION['paginaAnterior']=$paginaActual;     //y la pagina anterior la que habiamos guardado en la variable antes de cambiarla
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }

    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout