<?php


    /**
     * Controlador que contiene la vista del formulario y lo que se muestra de la API REST 
     *   y realiza conexion a la API REST selecionada http : //api.weatherstack.com/
     *   para mostrar la temperatura actual en el lugar seleccionado
     * 
     * @author Sonia Anton Llanes
     * @created 26/01/2022
     * @updated: 06/02/2021
     */


    //Si pulso en volver:
        if (isset($_REQUEST['volver'])){
            unset($_SESSION['oCiudad']);     //destruyo la sesion de Ciudad
            unset($_SESSION['oProvincia']);  //destruyo la sesion de Provincia
            $_SESSION['pagina']=$_SESSION['paginaAnterior']; //cambio el valor de la pagina actual a la que teniamos guardada en anterior: 'inicioPrivado'
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }
    
    //Si hay objeto oDepartamento guardado en la sesion: lo deserializamos el objeto guardado en la session guardandolo en una variable:
        if(isset($_SESSION['oDepartamento'])){
            $oDepartamento = $_SESSION['oDepartamento'];
        }
        
    //Si hay objeto oCiudad guardado en la sesion: lo deserializamos el objeto guardado en la session guardandolo en una variable:
        if(isset($_SESSION['oCiudad'])){
            $oCiudad = $_SESSION['oCiudad'];
        }
    //Si hay objeto oProvincia guardado en la sesion: lo deserializamos el objeto guardado en la session guardandolo en una variable:
        if(isset($_SESSION['oProvincia'])){
             $oProvincia= $_SESSION['oProvincia'];
        }
     
//Variables para el formulario
        $entradaOK = true;  //Variable para indicar que el formulario esta correcto
    //Array para guardar los errores del formulario:
        $aErrores = ['departamento' => null,   //E inicializo cada elemento
                     'ciudad' => null,
                     'provincia' => null]; 
        
//FORMULARIO:Si se ha pulsado "BuscarCiudad" o "BuscarProvincia"
    if (isset($_REQUEST['buscarCd']) || isset($_REQUEST['buscarPr'])){
      //Si BUSCO CIUDAD:
        if (isset($_REQUEST['buscarCd'])){  //Si busco una nueva ciudad
            unset($_SESSION['oCiudad']); //elimino el objeto Ciudad guardado en la sesion
            //Valido los campos del formulario con la libreria de validacion
                $aErrores['ciudad']= validacionFormularios::comprobarAlfabetico($_REQUEST['ciudad'], 200, 1, 1);
                    if ($aErrores['ciudad']!=null){ //si es distinto de null
                        $entradaOK = false;         //si hay algun error entradaOK es false
                    } 
                    else{ //compruebo que no se haya producido ningun error en ciudad
                        $ciudad= $_REQUEST['ciudad'];
                        $oCiudad= REST::buscarCiudad($ciudad);
                            if ($oCiudad->getError()!=null){
                                $aErrores['ciudad']= $oCiudad->getError();
                                $entradaOK = false;
                            }
                    }
        }
      //Si BUSCO PROVINCIA
        if (isset($_REQUEST['buscarPr'])){
            unset($_SESSION['oProvincia']); //elimino el objeto Provincia guardado en la sesion
            //Valido los campos del formulario con la libreria de validacion
                $aErrores['provincia']= validacionFormularios::comprobarEntero($_REQUEST['provincia'], 52, 1, 1);
                    if ($aErrores['provincia']!=null){ //si es distinto de null
                        $entradaOK = false;         //si hay algun error entradaOK es false
                    } 
                    else{ //compruebo que no se haya producido ningun error
                        $codProvincia= $_REQUEST['provincia'];
                        $oProvincia= REST::provincia($codProvincia);
                        if ($oProvincia == null){
                            $aErrores["provincia"]="Provincia no encontrada";
                            $entradaOK = false;
                        }
                    }
        }       
    }
    else{  //aun no se ha pulsado el boton enviar
        $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
    }
    //Si la entrada es correctas
    if($entradaOK){ 
        if(isset($oCiudad)){
            $_SESSION['oCiudad']= $oCiudad;
                $ciudad= $oCiudad->getCiudad();
                $region= $oCiudad->getRegion();
                $pais= $oCiudad->getPais();
                $temperatura= $oCiudad->getTemperatura();
                $icono= $oCiudad->getIcono();
        }
        if(isset($oProvincia)){
            $_SESSION['oProvincia']= $oProvincia;
                $provincia= $oProvincia->getProvincia();
                $idProvincia= $oProvincia->getIdProvincia();
                $descripcion= $oProvincia->getDescripcion();
                $tiempo= $oProvincia->getTiempo();
        }
        
    }else{   //Si no son correctas o aun no se ha pulsado "buscar" 
        $_SESSION['pagina']= 'rest';   //continuamos en la sesión para controlador y vista en 'login'
    }
    
        
    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout