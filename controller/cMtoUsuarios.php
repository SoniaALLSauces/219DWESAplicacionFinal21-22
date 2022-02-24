<?php


    /**
     * Controlador que contiene la vista de Detalle del usuario se ha logeado correctamente 
     *   con los datos $_SESSION, $_COOKIE, $_SERVER y phpInfo()
     * 
     * @author Sonia Anton Llanes
     * @created 26/01/2022
     * @updated: 24/02/2022
     */

     //Primero: Si no existe usuario logeado en esta aplicacion no puede entrar en paginas privadas, lo mando a la pagina de inicio:
        if(!isset($_SESSION['usuario219DWESAplicacionFinal'])){
            $_SESSION['tipo']='publico'; //
            $_SESSION['paginaEnCurso']='inicioPublico';  //cambio la sesion de pagina a rest
            header('Location: index.php');  //recargo el fichero index.php
                exit;
        }
    
    //Si pulso en volver:
        if (isset($_REQUEST['volver'])){
            $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior']; //cambio el valor de la pagina actual a la que teniamos guardada en anterior
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }
        
    //Variables para la busqueda del formulario    
        $entradaOK = true;  //Variable para indicar que el formulario esta correcto
    //Arrays para guardar los errores y las respuestas del formulario:
        $aErrores = ['descUsuario' => null];   //E inicializo cada elemento
        $aRespuestas = ['descUsuario' => ""];   //inicializo
        
    // FORMULARIO: Si se ha pulsado "buscarUsuario"    
        if (isset($_REQUEST['buscarUsuario'])){
            //Valido los campos del formulario con la libreria de validacion
                $aErrores['descUsuario']= validacionFormularios::comprobarAlfabetico($_REQUEST['descUsuario'], 255, 1, 0);
                    if ($aErrores['descUsuario']!=null){  //si es distinto de null
                        $entradaOK = false;    //si hay algun error entradaOK es false
                    }
        }
        else{  //aun no se ha pulsado el boton enviar
            $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
        }
        
        if($entradaOK){  //Si todas las entradas son correctas
            //guardo en aRespuestas la descripcion del usuario
                $aRespuestas['descUsuario']= $_REQUEST['descUsuario'];  //guardo la descripcion del usuario en la variable
                $_SESSION['descUsuario']= $aRespuestas['descUsuario'];  //y lo guardo en la session
        }  
    
    //Muestro los usuarios que coinciden con la descripcion introducida, o por defecto todos=> ""
//        $aODepartamento= DepartamentoPDO::buscaDepartamentosPorDesc($aRespuestas['descDepartamento'],$aRespuestas['estado'],$numRegistros*$pagRegistros,$numRegistros);
//        //Recorro el array de objetos Departamento que me devuelve el método y lo guardo en un array para mostrarlo en vista
//        $aDepartamentos= array();
//        foreach ($aODepartamento as $objDepartamento) {
//            $aDepartamentos[]= [
//                'codDepartamento' => $objDepartamento->getCodDepartamento(),
//                'descDepartamento' => $objDepartamento->getDescDepartamento(),
//                'fechaAlta' => $objDepartamento->getFechaCreacionDepartamento(),
//                'volumenNeg' => $objDepartamento->getVolumenDeNegocio(),
//                'fechaBaja' => $objDepartamento->getFechaBajaDepartamento()
//            ];
//        }
            

    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout
    