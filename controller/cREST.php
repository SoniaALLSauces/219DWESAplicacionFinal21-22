<?php


    /**
     * Controlador que contiene la vista de Inicio Publico 
     *   y controla a que pagina va en funcion del submit que se pulse
     * 
     * @author Sonia Anton Llanes
     * @created 25/01/2022
     * @updated: 25/01/2021
     */


    //Si pulso en volver:
        if (isset($_REQUEST['volver'])){
            $paginaActual=$_SESSION['pagina'];     //variable para guardar la pagina actual, por si queremos volver
                if(isset($_SESSION['paginaAnterior'])){  //
                    $_SESSION['pagina']=$_SESSION['paginaAnterior']; //cambio el valor de la pagina actual a la que teniamos guardada en anterior
                } else{
                    $_SESSION['pagina']='inicioPublico';
                }
            $_SESSION['paginaAnterior']=$paginaActual;     //y la pagina anterior la que habiamos guardado en la variable antes de cambiarla
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }
    
//Si se ha pulsado "Buscar"
        $entradaOK = true;  //Variable para indicar que el formulario esta correcto
    //Array para guardar los errores del formulario:
        $aErrores = ['ciudad' => null];   //E inicializo cada elemento
        
    if (isset($_REQUEST['buscar'])){
        //Valido los campos del formulario con la libreria de validacion
            $aErrores['ciudad']= validacionFormularios::comprobarAlfabetico($_REQUEST['ciudad'], 8, 1, 1);
                if ($aErrores['ciudad']!=null){ //si es distinto de null
                    $entradaOK = false;         //si hay algun error entradaOK es false
                }
    }
    else{  //aun no se ha pulsado el boton enviar
        $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
    }

    
    
        
    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout