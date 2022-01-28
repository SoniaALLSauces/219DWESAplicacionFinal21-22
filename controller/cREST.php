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

    
    //variable que contiene la ciudad de la cual se muestra la temperatura, que por defecto es Madrid 
        $ciudad= "Madrid";   
     
//Variables para el formulario
        $entradaOK = true;  //Variable para indicar que el formulario esta correcto
    //Array para guardar los errores del formulario:
        $aErrores = ['ciudad' => null];   //E inicializo cada elemento
//FORMULARIO:Si se ha pulsado "Buscar"        
    if (isset($_REQUEST['buscar'])){
        //Valido los campos del formulario con la libreria de validacion
            $aErrores['ciudad']= validacionFormularios::comprobarAlfabetico($_REQUEST['ciudad'], 200, 1, 1);
                if ($aErrores['ciudad']!=null){ //si es distinto de null
                    $entradaOK = false;         //si hay algun error entradaOK es false
                    
                } else{ //compruebo que no se haya producido ningun error
                    $ciudad= $_REQUEST['ciudad'];
                    $fichero= file_get_contents('http://api.weatherstack.com/current?access_key=791b13a34544da4f5f1669e760434b77&query='.$ciudad);//devuelve un String del contenido JSON
                    $aJson=json_decode($fichero,true);
                    if (isset($aJson['success']) && $aJson['success']==false){
                        switch ($aJson['error']['code']){
                            case 101:
                            case 102:
                            case 103:
                            case 104:
                            case 105: 
                                $aErrores['ciudad']= "Lo sentimos, se ha producido un error de conexion"; 
                                break;
                            case 615: $aErrores['ciudad']= "Introduzca una region correcta."; break;  
                        }
                        $ciudad= "Madrid";
                        $entradaOK = false; 
                    }
                }
    }
    else{  //aun no se ha pulsado el boton enviar
        $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
    }
    //Si la entrada es correctas
    if($entradaOK){  
        $ciudad= $_REQUEST['ciudad'];
        
    }
    
    //Conecto con el web services de: http://api.weatherstack.com/ con $ciudad por defecto o el introducido por el usuario
        $fichero= file_get_contents('http://api.weatherstack.com/current?access_key=791b13a34544da4f5f1669e760434b77&query='.$ciudad);//devuelve un String del contenido JSON
        $aJson=json_decode($fichero,true);//decodificamos el json y lo devolvemos en un array
        $_SESSION['APIrest']=$aJson;  //guardo el fichero en la sesion
    //variables que muestro al usuario recogidas del json que genera la web service
            $temperatura= $aJson['current']['temperature'];
            $region= $aJson['location']['region'];
            $pais= $aJson['location']['country'];   
    
        
    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout