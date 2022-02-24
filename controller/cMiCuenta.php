<?php


    /**
     * Controlador que contiene la vista de Editar Perfil del usuario se ha logeado 
     *   con los datos del Usuario de $_SESSION y permite editar la descripción
     * 
     * @author Sonia Anton Llanes
     * @created 01/02/2022
     * @updated: 24/02/2021
     */

     //Primero: Si no existe usuario logeado en esta aplicacion no puede entrar en paginas privadas, lo mando a la pagina de inicio:
        if(!isset($_SESSION['usuario219DWESAplicacionFinal'])){
            $_SESSION['tipo']='publico'; //
            $_SESSION['paginaEnCurso']='inicioPublico';  //cambio la sesion de pagina a rest
            header('Location: index.php');  //recargo el fichero index.php
                exit;
        }
    
    //Datos del Usuario guardado en la sesion: lo deserializamos el objeto guardado en la session guardandolo en una variable:
        $oUsuarioActual = $_SESSION['usuario219DWESAplicacionFinal'];
            $usuario = $oUsuarioActual->getCodUsuario();  //recuperamos el código del usuario
            $descripcion = $oUsuarioActual->getDescUsuario();  //recuperamos el código del usuario
            $conexiones = $oUsuarioActual->getNumConexiones(); //recuperamos el numero de conexiones del usuario
            $fechaHoraUltimaConexion = $oUsuarioActual->getFechaHoraUltimaConexion(); //recuperamos la fecha de la conexion anterior del usuario
                $ultimaConexion = new DateTime();
                $ultimaConexionFormat = $ultimaConexion-> setTimestamp($fechaHoraUltimaConexion) -> format ('d-m-Y H:i:s');
            $perfil = $oUsuarioActual->getPerfil(); 
      
    //Si pulso en cancelar:
        if (isset($_REQUEST['cancelar'])){
            $_SESSION['paginaEnCurso']= 'inicioPrivado'; //cambio el valor de la pagina actual a la que teniamos guardada en anterior
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }
        
    //Si se ha pulsado "Aceptar"
            $entradaOK = true;  //Variable para indicar que el formulario esta correcto
        //Array para guardar los errores del formulario:
            $aErrores = ['descripcion' => null];   //E inicializo cada elemento

        if (isset($_REQUEST['aceptar'])){
            //Valido los campos del formulario con la libreria de validacion
                $aErrores['descripcion']= validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'], 50, 1, 1);
                    if ($aErrores['descripcion']!=null){ //si es distinto de null
                        $entradaOK = false;              //si hay algun error entradaOK es false
                    }
        }
        else{  //aun no se ha pulsado el boton enviar
            $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
        }

        if($entradaOK){  //Si todas las entradas son correctas
            $descUsuario = $_REQUEST['descripcion'];
            $usuarioActual= UsuarioPDO::modificarUsuario($oUsuarioActual, $descUsuario);
            $_SESSION['usuario219DWESAplicacionFinal']= $usuarioActual;  //Guardamos el objeto usuario en la sesion
            $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];  //guardo en la sesión esta pagina para el boton volver
            $_SESSION['paginaEnCurso']= 'inicioPrivado';  //guardamos en la sesión para controlador y vista en 'inicioPrivado' cuando se ha logeado

                header('Location: index.php');  //recargo el fichero index.php
                exit;
        }   
        else{   //Si no son correctas o aun no se ha pulsado "Iniciar Sesion" 
            $_SESSION['paginaEnCurso']= 'editarUsuario';   //continuamos en la sesión para controlador y vista en 'login'
        }
        
    //Si pulso en borrar Usuario:
        //-- Pendiente ventana de confirmacion --//
        if (isset($_REQUEST['borrar'])){
            if (UsuarioPDO::borrarUsuario($usuario)){
                $_SESSION['usuario219DWESAplicacionFinal']= null;
                $_SESSION['paginaEnCurso']= 'inicioPublico'; //cambio el valor de la pagina actual a inicioPublico
                header('Location: index.php');  //recargo el fichero index.php con la ventana inicioPublico
                    exit;
            }
            else{
                echo "ERROR al BORRAR";
            }
        }
        

    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout