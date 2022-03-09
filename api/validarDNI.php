<?php

    /**
     * Api Rest Consultar Departamento por Código
     *   url local http://daw219.sauces.local/219DWESAplicacionFinal21-22/api/validarDNI.php?dni=valor
     *   url internet https://daw219.ieslossauces.es/219DWESAplicacionFinal21-22/api/validarDNI.php?dni=valor
     * 
     * @author Sonia Anton Llanes
     * @created  06/02/2022
     * @updated  09/02/2022
     */

    
    //Importamos todos los archivos necesarios
        require_once '../core/libreriaValidacion.php';


// FORMULARIO: Esta api da resultado cuando se consuta desde un formulario
    $entradaOK = true;  //Variable para indicar que el formulario esta correcto
        if (isset($_GET['dni'])){
            //Consulto con validarDni de la libreria de validacion
                $respuestaDni= validacionFormularios::validarDni($_GET['dni']);
    //            $objDepartamento= DepartamentoPDO::buscaDepartamentoPorCod('rr');
                    if ($respuestaDni==null){
                        $aDNI= [
                            'respuesta' => true,
                            'dni' => $_GET['dni'],
                            'mensaje' => "DNI Validado"
                        ];
                    }
                    else{
                        $aDNI= [
                            'respuesta' => false,
                            'dni' => $_GET['dni'],
                            'mensaje' => "DNI No Valido"
                        ];
                    }
        } 
        else{  //aun no se ha pulsado el boton enviar
            $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
        }

        if($entradaOK){  //Si la entrada es correcta
            //Devuelvo un json con los datos del departamento
            echo json_encode($aDNI); 
        }   

    
   