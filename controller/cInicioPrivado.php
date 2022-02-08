<?php


    /**
     * Controlador que contiene la vista de Inicio Privado una vez el usuario se ha logeado correctamente 
     *   muestra los datos del usuario: descripcion, numero de conexiones y fecha de la ultima conexion
     *   y controla a que pagina va en funcion del submit que se pulse
     * 
     * @author Sonia Anton Llanes
     * @created 25/01/2022
     * @updated: 06/02/2022
     */


    //Si hay objeto guardado en la sesion: lo deserializamos el objeto guardado en la session guardandolo en una variable:
        if($_SESSION['usuario219DWESAplicacionLoginLogOutMulticapa']!=null){
            $oUsuarioActual = $_SESSION['usuario219DWESAplicacionLoginLogOutMulticapa'];
                $aUsuario= [
                    'codUsuario' => $oUsuarioActual->getCodUsuario(),  //recuperamos la descripción del usuario
                    'descripcion' => $oUsuarioActual->getDescUsuario(),  //recuperamos la descripción del usuario
                    'conexiones' => $oUsuarioActual->getNumConexiones(), //recuperamos el numero de conexiones del usuario
                    'conexionAnterior' => $oUsuarioActual->getFechaHoraUltimaConexionAnterior() //recuperamos la fecha de la conexion anterior del usuario
                ];
                
        }
    
    //Si pulso en el boton REST:
        if (isset($_REQUEST['rest'])){
            $_SESSION['paginaAnterior']=$_SESSION['pagina']; //
            $_SESSION['pagina']='rest';  //cambio la sesion de pagina a rest
            header('Location: index.php');  //recargo el fichero index.php
                exit;
        } 
        
    //Si pulso en Mantenimiento Cuestiones me lleva a Work in Progress:
        if (isset($_REQUEST['cuestiones'])){
            $_SESSION['paginaAnterior']=$_SESSION['pagina']; //guardo la pagina actual en $_SESSION por si queremos volver
            $_SESSION['pagina']='wip';     //y guardo wip para la recarga de index
            header('Location: index.php');   //recargo el fichero index.php con la ventana wip
                exit;
        }
        
    //Si pulso en Opiniones me lleva a Work in Progress:
        if (isset($_REQUEST['opiniones'])){
            $_SESSION['paginaAnterior']=$_SESSION['pagina']; //guardo la pagina actual en $_SESSION por si queremos volver
            $_SESSION['pagina']='wip';     //y guardo wip para la recarga de index
            header('Location: index.php');   //recargo el fichero index.php con la ventana wip
                exit;
        }
             
    //Si pulso en Mantenimiento Departamentos me lleva a Mantenimiento de Departamentos:
        if (isset($_REQUEST['botonDepartamentos'])){
            $_SESSION['paginaAnterior']=$_SESSION['pagina']; //guardo la pagina actual en $_SESSION por si queremos volver
            $_SESSION['pagina']='mtoDepartamentos';     //y guardo login para la recarga de index
            header('Location: index.php');   //recargo el fichero index.php con la ventana login
                exit;
        } 
        
    //Si pulso en Mantenimiento Usuarios me lleva a Work in Progress:
        if (isset($_REQUEST['botonUsuarios'])){
            $_SESSION['paginaAnterior']=$_SESSION['pagina']; //guardo la pagina actual en $_SESSION por si queremos volver
            $_SESSION['pagina']='wip';     //y guardo wip para la recarga de index
            header('Location: index.php');   //recargo el fichero index.php con la ventana wip
                exit;
        } 
    
    //Si pulso en Editar Perfil me lleva a miCuenta:
        if (isset($_REQUEST['editarPerfil'])){
            $_SESSION['paginaAnterior']=$_SESSION['pagina']; //guardo la pagina actual en $_SESSION por si queremos volver
            $_SESSION['pagina']='editarUsuario';     //y guardo login para la recarga de index
            header('Location: index.php');   //recargo el fichero index.php con la ventana login
                exit;
        } 
       
    //Si pulso en detalle:
        if (isset($_REQUEST['detalle'])){
            $_SESSION['paginaAnterior']=$_SESSION['pagina']; //guardo la pagina actual en $_SESSION por si queremos volver
            $_SESSION['pagina']='detalle';     //cambio el valor en $_SESSION a 'detalle'
            header('Location: index.php');     //recargo el fichero index.php con la ventana detalle
                exit;
        }
        
    //Si pulso en Log Out:
        if (isset($_REQUEST['cerrarSesion'])){
            unset($_SESSION['usuario219DWESAplicacionLoginLogOutMulticapa']);  //elimino el usuario guardado en la sesion
            $_SESSION['pagina']='inicioPublico';     //y guardo login para la recarga de index
            header('Location: index.php');   //recargo el fichero index.php con la ventana login
                exit;
        }   
        
    

    //salida:
    require_once 'view/Layout.php';    //llamamos que se ejecute layout