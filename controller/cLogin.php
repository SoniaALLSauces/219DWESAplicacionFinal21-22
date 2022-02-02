<?php


    /**
     * Controlador que contiene la vista de LogIn 
     *   valida los datos que introduce el usuario en el formulario
     *   y controla a que pagina va en funcion del submit que se pulse
     * 
     * @author Sonia Anton Llanes
     * @created 25/01/2022
     * @updated: 30/01/2021
     */


    //Si pulso en volver desde la ventana login quiero volver a la ventana Pública:
        if (isset($_REQUEST['volver'])){
            $_SESSION['pagina']='inicioPublico';
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }
    
    //Si pulso en Registrarse me lleva a la ventana Registro:
        if (isset($_REQUEST['register'])){
            $_SESSION['paginaAnterior']=$_SESSION['pagina']; //guardo la pagina actual en $_SESSION por si queremos volver
            $_SESSION['pagina']='registro';     //y guardo en $_SESSION['pagina'] registro para la recarga de index
            header('Location: index.php');   //recargo el fichero index.php con la ventana registro
                exit;
        } 

         
//Si se ha pulsado "Iniciar Sesion"
        $entradaOK = true;  //Variable para indicar que el formulario esta correcto
    //Array para guardar los errores del formulario:
        $aErrores = ['usuario' => null,   //E inicializo cada elemento
                     'password' => null];
        
    if (isset($_REQUEST['login'])){
        //Valido los campos del formulario con la libreria de validacion
            $aErrores['usuario']= validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'], 8, 1, 1);
            $aErrores['password']= validacionFormularios::comprobarAlfabetico($_REQUEST['password'], 8, 1, 1);
                foreach ($aErrores as $campo => $error){  //Recorro array errores y compruebo si se ha incluido algún error
                        if ($error!=null){         //si es distinto de null
                            $entradaOK = false;    //si hay algun error entradaOK es false
                        }
                        else {     //Valido que el usuario existe
                            $oUsuario=UsuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['password']);
                                if (!$oUsuario){  //si no encuentra ningún registro (usuario y contraseña)
                                    $aErrores['usuario']= "usuario no encontrado";
                                    $entradaOK = false;
                                } 
                        }
                }
    }
    else{  //aun no se ha pulsado el boton enviar
        $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
    }

    if($entradaOK){  //Si todas las entradas son correctas
        $oUsuario->setFechaHoraUltimaConexionAnterior($oUsuario->getFechaHoraUltimaConexion());  //guardamos la fecha/hora de la ultima conexion antes de modificar
        $oUsuarioActual=UsuarioPDO::registrarUltimaConexion($oUsuario);   //modificamos el usuario con los datos de la ultima entrada
        $_SESSION['usuario219DWESAplicacionLoginLogOutMulticapa']= $oUsuarioActual;  //Guardamos el objeto usuario en la sesion
        $_SESSION['paginaAnterior']=$_SESSION['pagina'];  //guardo en la sesión esta pagina para el boton volver
        $_SESSION['pagina']= 'inicioPrivado';  //guardamos en la sesión para controlador y vista en 'inicioPrivado' cuando se ha logeado

            header('Location: index.php');  //recargo el fichero index.php
            exit;
    }   
    else{   //Si no son correctas o aun no se ha pulsado "Iniciar Sesion" 
        $_SESSION['pagina']= 'login';   //continuamos en la sesión para controlador y vista en 'login'
    }
    

    require_once 'view/Layout.php';    //llamamos que se ejecute layout
