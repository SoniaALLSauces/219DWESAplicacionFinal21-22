<?php


    /**
     * Controlador que contiene la vista de Registro de un nuevo usuario
     *   valida los datos que introduce el usuario en el formulario
     *   y controla que el usuario no exista (el codUsuario es primary key)
     *   y que la contraseña se confirme correctamente,
     *   guarda el nuevo usuario en la base de datos, en $_SESSION
     *   y carga la página de ventana privada para este nuevo usuario
     * 
     * @author Sonia Anton Llanes
     * @created 31/01/2022
     * @updated: 01/02/2021
     */

    
    //Si pulso en volver:
        if (isset($_REQUEST['volver'])){
            $paginaActual=$_SESSION['pagina'];     //guardo la pagina actual en una variable, por si queremos volver
            $_SESSION['pagina']=$_SESSION['paginaAnterior']; //cambio el valor de la pagina actual a la que teniamos guardada en anterior
            $_SESSION['paginaAnterior']=$paginaActual;     //y la pagina anterior la que habiamos guardado en la variable antes de cambiarla
            header('Location: index.php');  //recargo el fichero index.php con la ventana detalle
                exit;
        }
    
    //Si pulso en cancelar: vuelvo a la pantalla inicioPublico
        if (isset($_REQUEST['cancelar'])){
            $_SESSION['paginaAnterior']= $_SESSION['pagina'];   //guardo la pagina actual en $_SESSION['paginaAnterior'] antes de cargar el login
            $_SESSION['pagina']= 'inicioPublico';   //al cancelar el registro volvemos a la pantalla de inicioPublico
            header('Location: index.php');  //recargo el fichero index.php con la ventana login
                exit;
        }
        
    //Si pulso en aceptar: valido las entradas, compruebo que usuario no exista, inicio sesion en ventana inicioPrivado
        $entradaOK = true;  //Variable para indicar que el formulario esta correcto
    //Array para guardar los errores del formulario:
        $aErrores = ['usuario' => null,   //E inicializo cada elemento
                     'descUsuario' => null,
                     'password' => null,
                     'passwordRep' => null];
    //Array para guardar las entradas del formulario correctas    
        $aRespuestas = ['usuario' => null,   //E inicializo cada elemento
                        'descripcion' => null,
                        'password' => null]; 
        
    if (isset($_REQUEST['aceptar'])){
        //Valido los campos del formulario con la libreria de validacion
            $aErrores['usuario']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 8, 1, 1);
            $aErrores['descUsuario']= validacionFormularios::comprobarAlfabetico($_REQUEST['descUsuario'], 255, 1, 1);
            $aErrores['password']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['password'], 8, 1, 1);
            $aErrores['passwordRep']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['passwordRep'], 8, 1, 1);
                foreach ($aErrores as $campo => $error){  //Recorro array errores y compruebo si se ha incluido algún error
                    if ($error!=null){         //si es distinto de null
                        $entradaOK = false;    //si hay algun error entradaOK es false
                    }
                    else if ($_REQUEST['password']!=$_REQUEST['passwordRep']){
                        $aErrores['passwordRep']= "las contraseñas no coinciden";
                        $entradaOK = false;
                    }
                    else {     //Valido que el usuario no existe
                        $existe=UsuarioPDO::validarCodNoExiste($_REQUEST['usuario']);
                            if ($existe){  //si encuentra algun registro (usuario)
                                $aErrores['usuario']= "usuario ya existe";
                                $entradaOK = false;
                            } 
                    }
                }
    }
    else{  //aun no se ha pulsado el boton enviar
        $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
    }


    if($entradaOK){  //Si todas las entradas son correctas
        $aRespuestas['usuario']= $_REQUEST['usuario'];
        $aRespuestas['descripcion']= $_REQUEST['descUsuario'];
        $aRespuestas['password']= $_REQUEST['password'];

        $usuarioActual=UsuarioPDO::altaUsuario($aRespuestas['usuario'], $aRespuestas['descripcion'], $aRespuestas['password']);   //modificamos el usuario con los datos de la ultima entrada
        
        $_SESSION['usuario219DWESAplicacionFinal']= $usuarioActual;  //Guardamos el objeto usuario en la sesion
        $_SESSION['pagina']= 'inicioPrivado';  //guardamos en la sesión para controlador y vista en 'inicioPrivado' cuando se ha logeado

            header('Location: index.php');  //recargo el fichero index.php
            exit;
    }   
    else{   //Si no son correctas o aun no se ha pulsado "Iniciar Sesion" 
        $_SESSION['pagina']= 'registro';   //continuamos en la sesión para controlador y vista en 'registro'
    }
        
        

    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout