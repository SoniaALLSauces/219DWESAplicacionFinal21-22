<?php


    /**
     * Contiene los archivos y variables necesarias para la aplicacion
     * 
     * @author Sonia Anton Llanes
     * @created 21/01/2022
     * @updated: 24/01/2022
     */


//Importamos todos los archivos necesarios para la aplicación
    //Archivo que contiene todos los archivos y los arrays de archivos necesarios
        require_once 'config/confDB.php';

    //Libreria de validacion
        require_once 'core/libreriaValidacion.php';
    
    //para la cookie idioma:
        require_once 'idiomas.php';
        
    //Todas las Clases del modelo:
        require_once 'model/Usuario.php';
        require_once 'model/UsuarioPDO.php';
        require_once 'model/DBPDO.php';
        require_once 'model/Ciudad.php';
        require_once 'model/Provincia.php';
        require_once 'model/REST.php';
        require_once 'model/Departamento.php';
        require_once 'model/DepartamentoPDO.php';

//Array con los controladores
    $controladores = [
        'inicioPublico' => 'controller/cInicioPublico.php',
        'login' => 'controller/cLogin.php',
        'registro' => 'controller/cRegistro.php',
        'inicioPrivado' => 'controller/cInicioPrivado.php',
        'detalle' => 'controller/cDetalle.php',
        'editarUsuario' => 'controller/cMiCuenta.php',
        'wip' => 'controller/cWIP.php',
        'rest' => 'controller/cREST.php',
        'mtoDepartamentos' => 'controller/cMtoDepartamentos.php',
        'mtoUsuarios' => 'controller/cMtoUsuarios.php'
    ];

//Array con las vistas
    $vistas = [
        'layout' => 'view/Layout.php',
        'inicioPublico' => 'view/vInicioPublico.php',
        'login' => 'view/vLogin.php',
        'registro' => 'view/vRegistro.php',
        'inicioPrivado' => 'view/vInicioPrivado.php',
        'detalle' => 'view/vDetalle.php',
        'editarUsuario' => 'view/vMiCuenta.php',
        'wip' => 'view/vWIP.php',
        'rest' => 'view/vREST.php',
        'mtoDepartamentos' => 'view/vMtoDepartamentos.php',
        'mtoUsuarios' => 'view/vMtoUsuarios.php'
    ];
    