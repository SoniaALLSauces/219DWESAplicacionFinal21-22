<?php


    /**
     * Controlador que contiene la vista del formulario y lo que se muestra de la API REST 
     *   y realiza conexion a la API REST selecionada http : //api.weatherstack.com/
     *   para mostrar la temperatura actual en el lugar seleccionado
     * 
     * @author Sonia Anton Llanes
     * @created 26/01/2022
     * @updated: 26/01/2021
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

    
    //variable que contiene la ciudad de la cual se muestra la temperatura, que por defecto esta con parámetros como si estuviese vacio 
        $oCiudad= new Ciudad("_", "_", "_", 0, null);  
     
//Variables para el formulario
        $entradaOK = true;  //Variable para indicar que el formulario esta correcto
    //Array para guardar los errores del formulario:
        $aErroresCd = ['ciudad' => null];   //E inicializo cada elemento
        $aErroresPr = ['provincia' => null];   //E inicializo cada elemento
    //Array Respuestas:
        $aRespuestas = ['ciudad' => null,   //E inicializo cada elemento
                        'provincia' => null]; 
        
//FORMULARIO:Si se ha pulsado "BuscarCiudad" o "BuscarProvincia"
    if (isset($_REQUEST['buscarCd']) || isset($_REQUEST['buscarPv'])){
      //BUSCAR CIUDAD:
        if (isset($_REQUEST['buscarCd'])){
            //Valido los campos del formulario con la libreria de validacion
                $aErroresCd['ciudad']= validacionFormularios::comprobarAlfabetico($_REQUEST['ciudad'], 200, 1, 1);
                    if ($aErroresCd['ciudad']!=null){ //si es distinto de null
                        $entradaOK = false;         //si hay algun error entradaOK es false
                    } 
                    else{ //compruebo que no se haya producido ningun error
                        $ciudad= $_REQUEST['ciudad'];
                        $oCiudad= REST::buscarCiudad($ciudad);
                            if ($oCiudad->getError()!=null){
                                $aErroresCd['ciudad']= $oCiudad->getError();
                                $entradaOK = false;
                            }                   
                    }
        }
        else if (isset($_REQUEST['buscarPr'])){
            //Valido los campos del formulario con la libreria de validacion
                $aErroresPr['provincia']= validacionFormularios::comprobarEntero($_REQUEST['provincia'], 2, 1, 1);
                    if ($aErroresPr['provincia']!=null){ //si es distinto de null
                        $entradaOK = false;         //si hay algun error entradaOK es false
                    } 
                    else{ //compruebo que no se haya producido ningun error
                        $codProvincia= $_REQUEST['provincia'];
                                             
                    }
        }
        else{  //aun no se ha pulsado el boton enviar
            $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
        }
    }
    //Si la entrada es correctas
    if($entradaOK){  
        $aRespuestas['ciudad'] = $_REQUEST['ciudad'];
        $aRespuestas['provincia'] = $_REQUEST['provincia'];
        
        $oCiudad= REST::buscarCiudad($ciudad);
    }else{   //Si no son correctas o aun no se ha pulsado "buscar" 
        $_SESSION['pagina']= 'rest';   //continuamos en la sesión para controlador y vista en 'login'
    }
    
    
    //variables que muestro al usuario obtenidas del objeto Ciudad Creado
            $temperatura= $oCiudad->getTemperatura();
            $region= $oCiudad->getRegion();
            $pais= $oCiudad->getPais();   
    
        
    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout