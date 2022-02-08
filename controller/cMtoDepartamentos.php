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
            $paginaActual=$_SESSION['pagina'];     //guardo la pagina actual en una variable, por si queremos volver
            $_SESSION['pagina']=$_SESSION['paginaAnterior']; //cambio el valor de la pagina actual a la que teniamos guardada en anterior
            $_SESSION['paginaAnterior']=$paginaActual;     //y la pagina anterior la que habiamos guardado en la variable antes de cambiarla
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
            //Busco registros que coincidan con la descripción introducida y los guardo en la variable $aRespuestas
            $aRespuestas['descDepartamento']= $_REQUEST['descDepartamento'];  //guardo la respuesta del usuario en la variable
        }   

    //Busco los departamentos que coinciden con la descripcion introducida, o por defecto todas=> ""
        $aODepartamento= DepartamentoPDO::buscaDepartamentosPorDesc($aRespuestas['descDepartamento']);
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
    