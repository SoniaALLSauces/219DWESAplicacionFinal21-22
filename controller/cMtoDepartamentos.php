<?php


    /**
     * Controlador que contiene la vista de Mantenimiento de Departamentos 
     *   con el formulario de busqueda y el listado de los departamentos
     * 
     * @author Sonia Anton Llanes
     * @created 02/02/2022
     * @updated: 02/02/2022
     */

    
    //Si pulso en volver:
        if (isset($_REQUEST['volver'])){
            $paginaActual=$_SESSION['pagina'];     //guardo la pagina actual en una variable, por si queremos volver
            $_SESSION['pagina']=$_SESSION['paginaAnterior']; //cambio el valor de la pagina actual a la que teniamos guardada en anterior
            $_SESSION['paginaAnterior']=$paginaActual;     //y la pagina anterior la que habiamos guardado en la variable antes de cambiarla
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }

    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout
    