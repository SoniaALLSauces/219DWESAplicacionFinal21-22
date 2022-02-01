<?php


    /**
     * Controlador que contiene la vista de Registro de un nuevo usuario
     *   valida los datos que introduce el usuario en el formulario
     *   y controla que el usuario no exista (el codUsuario es primary key)
     *   y que la contraseña se confirme correctamente,
     *   guarda el nuevo usuario en la base de datos, en $_SESSION
     *   y carga la página de ventana privada para este nuevo usuario
     * 
     * @author Sonia Anton Llanes
     * @created 31/01/2022
     * @updated: 31/01/2021
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