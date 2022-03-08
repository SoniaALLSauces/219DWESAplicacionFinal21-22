<?php


    /**
     * Controlador que contiene la vista de Mantenimiento de Departamentos 
     *   con el formulario de busqueda y el listado de los departamentos
     * 
     * @author Sonia Anton Llanes
     * @created 02/02/2022
     * @updated: 24/02/2022
     */

    
    //Si pulso en volver:
        if (isset($_REQUEST['volver'])){
            $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior']; //cambio el valor de la pagina actual a la que teniamos guardada en anterior
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }

    //VARIABLES
        //Variable para controlar el numero de pagina de los registros que muestro
            $pagRegistros;   
                if (isset($_SESSION['pagRegistros'])){         //si ya existe una paginación
                    $pagRegistros= $_SESSION['pagRegistros'];  //la pagina es la que está guardada en la sesion
                } else{
                    $pagRegistros= 0;                          //si no, lo inicializo a 0
                    $_SESSION['pagRegistros']= $pagRegistros;  //y lo guardo en la session
                }
        //Variables para la busqueda del formulario    
            $entradaOK = true;  //Variable para indicar que el formulario esta correcto
        //Arrays para guardar los errores y las respuestas del formulario:
            $aErrores = ['descDepartamento' => null];   //E inicializo cada elemento
            $aRespuestas = ['descDepartamento' => "",   //inicializo
                            'estado' => "todos"];       //estado lo inicializo a todos
                if(isset($_SESSION['descDepartamento'])){
                    $aRespuestas['descDepartamento']= $_SESSION['descDepartamento']; //si existe en la sesion la descripcion buscada la recupero (para no perderla en la paginacion)
                }
                if(isset($_SESSION['estado'])){
                    $aRespuestas['estado']= $_SESSION['estado']; //si existe en la sesion la recupero (para no perder la seleccion en la paginacion)
                }
        
    // FORMULARIO: Si se ha pulsado "buscarDto"    
        if (isset($_REQUEST['buscarDto'])){
            //Valido los campos del formulario con la libreria de validacion
                $aErrores['descDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 255, 1, 0);
                    if ($aErrores['descDepartamento']!=null){  //si es distinto de null
                        $entradaOK = false;    //si hay algun error entradaOK es false
                        //Y pagino con la busqueda de aRespuestas por defecto: "" =>todos
                        $numDepartamentos= DepartamentoPDO::contadorDepartamentos($aRespuestas['descDepartamento'],$aRespuestas['estado']);
                    }
        }
        else{  //aun no se ha pulsado el boton enviar
            $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
            //Hago una busqueda de todos los departamentos y los cuento para tener el numero máximo de paginas a mostrar
            $numDepartamentos= DepartamentoPDO::contadorDepartamentos($aRespuestas['descDepartamento'],$aRespuestas['estado']);
        }

        if($entradaOK){  //Si todas las entradas son correctas
            //guardo en aRespuestas la descripcion y el estado introducida por el usuario
                $aRespuestas['descDepartamento']= $_REQUEST['descDepartamento'];  //guardo la descripcion del usuario en la variable
                $_SESSION['descDepartamento']= $aRespuestas['descDepartamento'];  //y lo guardo en la session
                if(isset($_REQUEST['muestroDep'])){
                    $aRespuestas['estado']= $_REQUEST['muestroDep'];  //guardo la respuesta que esta seleccionada radiobutton
                    $_SESSION['estado']= $aRespuestas['estado'];  //y lo guardo en la session
                }
                
            //Inicializo a 0 el número de página a mostrar 
                $pagRegistros= 0;
                $_SESSION['pagRegistros']= $pagRegistros;  //y lo guardo en la session
            //Hago una busqueda de los departamentos por descripcion y los cuento para tener el numero máximo de paginas a mostrar
            $numDepartamentos= DepartamentoPDO::contadorDepartamentos($aRespuestas['descDepartamento'],$aRespuestas['estado']);
        }  
        
    //Muestro los departamentos que coinciden con la descripcion introducida, y el estado seleccionado o por defecto todas=> ""
        $numRegistros=3;
        $maxPaginas=ceil($numDepartamentos/$numRegistros);
        $aODepartamento= DepartamentoPDO::buscaDepartamentosPorDesc($aRespuestas['descDepartamento'],$aRespuestas['estado'],$numRegistros*$pagRegistros,$numRegistros);
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
    
    //Si pulsamos en primera página
        if (isset($_REQUEST['primeraPagina'])){
            $_SESSION['pagRegistros']= 0;   //me posiciono en la primera página
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }
    //Si pulsamos en atrasar página de registros, teniendo en cuenta que la página minima es 0
        if (isset($_REQUEST['paginaMenos']) && $_SESSION['pagRegistros']>0){
            $_SESSION['pagRegistros']= $pagRegistros-1;   //resto 1 a la sesión de la página
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }
    
    //Si pulsamos en avanzar página de registros, teniendo en cuenta la página máxima que es $maxPaginas -1
        if (isset($_REQUEST['paginaMas']) && $_SESSION['pagRegistros']<$maxPaginas-1){
            $aODepartamento= DepartamentoPDO::buscaDepartamentosPorDesc($aRespuestas['descDepartamento'],$aRespuestas['estado']);
            if(count($aODepartamento)){
                $_SESSION['pagRegistros']= $pagRegistros+1;   //sumo 1 a la sesion de la pagina
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit; 
            }
        }
    //Si pulsamos en ultima página
        if (isset($_REQUEST['ultimaPagina'])){
            $_SESSION['pagRegistros']= $maxPaginas-1;   //me posiciono en el numero máximo de páginas, la última
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }
        
    //Si pulso altaDepartamento - reactivo:
        if (isset($_REQUEST['altaDto'])){
            DepartamentoPDO::rehabilitarDepartamento($_REQUEST['altaDto']);
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit; 
        }

    //Si pulso bajaDepartamento:
        if (isset($_REQUEST['bajaDto'])){
            DepartamentoPDO::bajaLogicaDepartamento($_REQUEST['bajaDto']);
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit; 
        }
    
    //Si pulso editarDepartamento:
        if (isset($_REQUEST['editarDto'])){
            $_SESSION['codDepartamento'] = $_REQUEST['editarDto'];
            $_SESSION['paginaEnCurso']= 'editarDepartamento';
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit; 
        }
    

    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout
    