<?php


    /**
     * Controlador que contiene la vista de Mantenimiento de Departamentos 
     *   con el formulario de busqueda y el listado de los departamentos
     * 
     * @author Sonia Anton Llanes
     * @created 02/02/2022
     * @updated: 04/02/2022
     */

    
    //Si pulso en volver:
        if (isset($_REQUEST['volver'])){
            $paginaActual=$_SESSION['pagina'];     //guardo la pagina actual en una variable, por si queremos volver
            $_SESSION['pagina']=$_SESSION['paginaAnterior']; //cambio el valor de la pagina actual a la que teniamos guardada en anterior
            $_SESSION['paginaAnterior']=$paginaActual;     //y la pagina anterior la que habiamos guardado en la variable antes de cambiarla
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }
        
    //Si se ha pulsado "Iniciar Sesion"
        $entradaOK = true;  //Variable para indicar que el formulario esta correcto
    //Arrays para guardar los errores y las respuestas del formulario:
        $aErrores = ['descDepartamento' => null];   //E inicializo cada elemento
        $aRespuestas = ['descDepartamento' => null];   //E inicializo cada elemento
        
    if (isset($_REQUEST['login'])){
        //Valido los campos del formulario con la libreria de validacion
            $aErrores['descDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 255, 1, 1);
                if ($aErrores['descDepartamento']!=null){         //si es distinto de null
                    $entradaOK = false;    //si hay algun error entradaOK es false
                }
                else {     //Valido que el usuario existe

                }
    }
    else{  //aun no se ha pulsado el boton enviar
        $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
    }

    if($entradaOK){  //Si todas las entradas son correctas
        
        $_SESSION['paginaAnterior']=$_SESSION['pagina'];  //guardo en la sesión esta pagina para el boton volver
        $_SESSION['pagina']= 'mtoDepartamentos';  //guardamos en la sesión para controlador y vista en 'inicioPrivado' cuando se ha logeado

            header('Location: index.php');  //recargo el fichero index.php
            exit;
    }   
    else{   //Si no son correctas o aun no se ha pulsado "Iniciar Sesion" 
        $_SESSION['pagina']= 'mtoDepartamentos';   //continuamos en la sesión para controlador y vista en 'login'
    }
    

    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout
    