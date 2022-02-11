<?php

    /**
     * Api Rest Consultar Departamento por Código
     *   url local http://daw219.sauces.local/219DWESAplicacionFinal21-22/api/consultaDepartamentoPorCodigo.php?codDepartamento=valor
     *   url internet https://daw219.ieslossauces.es/219DWESAplicacionFinal21-22/api/consultaDepartamentoPorCodigo.php?codDepartamento=valor
     * 
     * @author Sonia Anton Llanes
     * @created  06/02/2022
     * @updated  09/02/2022
     */

    
    //Importamos todos los archivos necesarios
        require_once '../config/confDB.php';
        require_once '../model/DBPDO.php';
        require_once '../model/Departamento.php';
        require_once '../model/DepartamentoPDO.php';


// FORMULARIO: Esta api da resultado cuando se consuta desde un formulario
    $entradaOK = true;  //Variable para indicar que el formulario esta correcto
        if (isset($_GET['codDepartamento'])){
            //Compruebo que la entrada sean tres caracteres alfabéticos en mayuscula
            if ($_GET['codDepartamento']=== strtoupper($_GET['codDepartamento'])){
                $aDepartamento= [
                    'respuesta' => false,
                    'mensaje' => "El codigo son  tres letras mayusculas"
                ]; 
            } else{ //si no hay error en la entrada -> tres letras mayusculas
                //Consulto si existe el codigo de departamento en mi tabla
                $objDepartamento= DepartamentoPDO::buscaDepartamentoPorCod($_GET['codDepartamento']);
    //            $objDepartamento= DepartamentoPDO::buscaDepartamentoPorCod('rr');
                    if ($objDepartamento){
                        $aDepartamento= [
                            'respuesta' => true,
                            'codigo' => $objDepartamento->getCodDepartamento(),
                            'descripcion' => $objDepartamento->getDescDepartamento(),
                            'fechaAlta' => $objDepartamento->getFechaCreacionDepartamento(),
                            'fechaBaja' => $objDepartamento->getFechaBajaDepartamento(),
                            'volumenNeg' => $objDepartamento->getVolumenDeNegocio()
                        ];
                    }
                    else{
                        $aDepartamento= [
                            'respuesta' => false,
                            'mensaje' => "departamento no encontrado en base de datos"
                        ];
                    }
            }
        } 
        else{  //aun no se ha pulsado el boton enviar
            $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
        }

        if($entradaOK){  //Si la entrada es correcta
            //Devuelvo un json con los datos del departamento
            echo json_encode($aDepartamento); 
        }   

    
   