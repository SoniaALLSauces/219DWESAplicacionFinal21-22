<?php


    /**
     * Controlador que contiene la vista de Mantenimiento de Departamentos 
     *   con el formulario de busqueda y el listado de los departamentos
     * 
     * @author Sonia Anton Llanes
     * @created 02/02/2022
     * @updated: 07/02/2022
     */

    
    //Si pulso en volver:
        if (isset($_REQUEST['volver'])){
            $paginaActual=$_SESSION['paginaEnCurso'];     //guardo la pagina actual en una variable, por si queremos volver
            $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior']; //cambio el valor de la pagina actual a la que teniamos guardada en anterior
            $_SESSION['paginaAnterior']=$paginaActual;     //y la pagina anterior la que habiamos guardado en la variable antes de cambiarla
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }

    //Variable para controlar el numero de pagina de los registros que muestro
        $pagRegistros;   
            if (isset($_SESSION['pagRegistros'])){         //si ya existe una paginación
                $pagRegistros= $_SESSION['pagRegistros'];  //la pagina es la que está guardada en la sesion
            } else{
                $pagRegistros= 0;                          //si no, lo inicializo a 0
                $_SESSION['pagRegistros']= $pagRegistros;  //y lo guardo en la session
            }
            
    //Si pulsamos en atrasar página de registros
//        if (isset($_REQUEST['paginaMenos']) && $_SESSION['pagRegistros']>0){
//            $_SESSION['pagRegistros']= $pagRegistros-1;   //resto 1 a la sesión de la página
//            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
//                exit;
//        }
    
    //Si pulsamos en avanzar página de registros
        if (isset($_REQUEST['mas'])){
            $_SESSION['pagRegistros']= 3;   //sumo 1 a la sesion de la pagina
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }    

    //Variables para la busqueda del formulario    
        $entradaOK = true;  //Variable para indicar que el formulario esta correcto
    //Arrays para guardar los errores y las respuestas del formulario:
        $aErrores = ['descDepartamento' => null];   //E inicializo cada elemento
        $aRespuestas = ['descDepartamento' => ""];   //inicializo
        

    // FORMULARIO: Si se ha pulsado "buscarDto"    
        if (isset($_REQUEST['buscarDto'])){
            //Valido los campos del formulario con la libreria de validacion
                $aErrores['descDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 255, 1, 1);
                    if ($aErrores['descDepartamento']!=null){  //si es distinto de null
                        $entradaOK = false;    //si hay algun error entradaOK es false
                    }
        }
        else{  //aun no se ha pulsado el boton enviar
            $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
        }

        if($entradaOK){  //Si todas las entradas son correctas
            //guardo en aRespuestas la descripcion introducida por el usuario
                $aRespuestas['descDepartamento']= $_REQUEST['descDepartamento'];  //guardo la respuesta del usuario en la variable
            //Inicializo a 0 el número de página a mostrar 
//                $pagRegistros= 0;
//                $_SESSION['pagRegistros']= $pagRegistros;  //y lo guardo en la session
        }  
        
    
    //Muestro los departamentos que coinciden con la descripcion introducida, o por defecto todas=> ""
        $aODepartamento= DepartamentoPDO::buscaDepartamentosPorDesc($aRespuestas['descDepartamento'],5*$pagRegistros);
        //Recorro el array de objetos Departamento que me devuelve el método y lo guardo en un array para mostrarlo en vista
        $aDepartamentos= array();
        foreach ($aODepartamento as $objDepartamento) {
            $aDepartamentos[]= [
                'codDepartamento' => $objDepartamento->getCodDepartamento(),
                'descDepartamento' => $objDepartamento->getDescDepartamento(),
                'fechaAlta' => $objDepartamento->getFechaCreacionDepartamento(),
                'volumenNeg' => $objDepartamento->getVolumenDeNegocio(),
                'fechaBaja' => $objDepartamento->getFechaBajaDepartamento()
            ];
        }
    

    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout
    