<?php


    /**
     * Controlador que contiene la vista de Detalle del usuario se ha logeado correctamente 
     *   con los datos $_SESSION, $_COOKIE, $_SERVER y phpInfo()
     * 
     * @author Sonia Anton Llanes
     * @created 26/01/2022
     * @updated: 24/02/2022
     */

    
    //Si pulso en volver:
        if (isset($_REQUEST['volver'])){
            unset($_SESSION[descUsuario]);
            $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior']; //cambio el valor de la pagina actual a la que teniamos guardada en anterior
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }
        
    //Variables para la busqueda del formulario    
//        $entradaOK = true;  //Variable para indicar que el formulario esta correcto
//    //Arrays para guardar los errores y las respuestas del formulario:
//        $aErrores = ['descUsuario' => null];   //E inicializo cada elemento
//        $aRespuestas = ['descUsuario' => ""];   //inicializo
        
    // FORMULARIO: Si se ha pulsado "buscarUsuario"    
//        if (isset($_REQUEST['buscarUsuario'])){
//            //Valido los campos del formulario con la libreria de validacion
//                $aErrores['descUsuario']= validacionFormularios::comprobarAlfabetico($_REQUEST['descUsuario'], 255, 1, 0);
//                    if ($aErrores['descUsuario']!=null){  //si es distinto de null
//                        $entradaOK = false;    //si hay algun error entradaOK es false
//                    }
//        }
//        else{  //aun no se ha pulsado el boton enviar
//            $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
//        }
//        
//        if($entradaOK){  //Si todas las entradas son correctas
//            //guardo en aRespuestas la descripcion del usuario
//                $aRespuestas['descUsuario']= $_REQUEST['descUsuario'];  //guardo la descripcion del usuario en la variable
//                $_SESSION['descUsuario']= $aRespuestas['descUsuario'];  //y lo guardo en la session
//        }  
    
    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout
    