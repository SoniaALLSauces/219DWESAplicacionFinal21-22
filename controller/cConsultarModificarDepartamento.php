<?php


    /**
     * Controlador que contiene la vista de modificar departamento se ha seleccionado 
     *   con los datos del codDepartamento de $_SESSION y permite editar la descripción y el volumen
     * 
     * @author Sonia Anton Llanes
     * @created 07/03/2022
     * @updated: 07/03/2021
     */

    
    //Datos del Usuario guardado en la sesion: lo deserializamos el objeto guardado en la session guardandolo en una variable:
        $oDepartamento = DepartamentoPDO::buscaDepartamentoPorCod($_SESSION['codDepartamento']);  //Obtengo los datos del departamento seleccionado
            $codigo = $oDepartamento->getCodDepartamento();              //recuperamos el código del departamento
            $descripcion = $oDepartamento->getDescDepartamento();        //recuperamos la descripción del departamento
            $fechaAlta = $oDepartamento->getFechaCreacionDepartamento(); //recuperamos la fecha de alta o rehabilitación
            $fechaBaja = $oDepartamento->getFechaBajaDepartamento();     //recuperamos la fecha de baja
            $volumen = $oDepartamento->getVolumenDeNegocio();            //recuperamos el volumen de negocio
      
    //Si pulso en cancelar:
        if (isset($_REQUEST['cancelar'])){
            $_SESSION['paginaEnCurso']= 'mtoDepartamentos'; //cambio el valor de la pagina actual a mantenimiento de Departamentos
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }
        
    //Si se ha pulsado "Aceptar"
            $entradaOK = true;  //Variable para indicar que el formulario esta correcto
        //Array para guardar los errores del formulario:
            $aErrores = ['descripcion' => null,   //E inicializo cada elemento
                         'volumen' => null];
            $aRespuestas = ['descripcion' => null,   //E inicializo cada elemento
                         'volumen' => null];

        if (isset($_REQUEST['aceptar'])){
            //Valido los campos del formulario con la libreria de validacion
                $aErrores['descripcion']= validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'], 50, 1, 1);
                $aErrores['volumen']= validacionFormularios::comprobarFloat($_REQUEST['volumen'], 50, 1, 1);
                    if ($aErrores['descripcion']!=null || $aErrores['volumen']!=null){ //si es distinto de null
                        $entradaOK = false;              //si hay algun error entradaOK es false
                    }
        }
        else{  //aun no se ha pulsado el boton enviar
            $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
        }

        if($entradaOK){  //Si todas las entradas son correctas
            $aRespuestas['descripcion'] = $_REQUEST['descripcion'];
            $aRespuestas['volumen'] = $_REQUEST['volumen'];
            DepartamentoPDO::modificaDepartamento($codigo, $aRespuestas['descripcion'], $aRespuestas['volumen']);
//            $usuarioActual= UsuarioPDO::modificarUsuario($oUsuarioActual, $descUsuario);
//            $_SESSION['usuario219DWESAplicacionFinal']= $usuarioActual;  //Guardamos el objeto usuario en la sesion
//            $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];  //guardo en la sesión esta pagina para el boton volver
            $_SESSION['paginaEnCurso']= 'mtoDepartamentos';  //guardamos en la sesión para controlador y vista en 'inicioPrivado' cuando se ha logeado

                header('Location: index.php');  //recargo el fichero index.php
                exit;
        }   
        else{   //Si no son correctas o aun no se ha pulsado "Iniciar Sesion" 
            $_SESSION['paginaEnCurso']= 'editarDepartamento';   //continuamos en la sesión para controlador y vista en 'login'
        }
        

    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout