<?php

    /**
     * Api Rest Consultar Departamento por Código
     *   url http://daw219.sauces.local/219DWESAplicacionFinal21-22/api/consultaDtoXCodigo.php?codDepartamento=XXX
     * 
     * @author Sonia Anton Llanes
     * @created  02/02/2022
     * @updated  02/02/2022
     */

    
    //Importamos todos los archivos necesarios
        require_once 'config/confDB.php';
        require_once 'model/DBPDO.php';
        require_once 'model/REST.php';
        require_once 'model/Departamento.php';
        require_once 'model/DepartamentoPDO.php';


// FORMULARIO: Esta api da resultado cuando se consuta desde un formulario
        $entradaOK = true;  //Variable para indicar que el formulario esta correcto
        if (isset($_GET['codDepartamento'])){
            //Consulto si existe el codigo de departamento en mi tabla
            $objDepartamento= DepartamentoPDO::buscaDepartamentoPorCod($_GET['codDepartamento']);
                if ($ojbDepartamento){
                    $aDepartament[]= [
                        'codDepartamento' => $objDepartamento->getCodDepartamento(),
                        'descDepartamento' => $objDepartamento->getDescDepartamento(),
                        'fechaAlta' => $objDepartamento->getFechaCreacionDepartamento(),
                        'fechaBaja' => $objDepartamento->getFechaBajaDepartamento(),
                        'volumenNeg' => $objDepartamento->getVolumenDeNegocio()
                    ];
                }
        }
        else{  //aun no se ha pulsado el boton enviar
            $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
        }

        if($entradaOK){  //Si la entradas es correcta
            //Devuelvo un json con los datos del departamento
            
            
        }   

    
    

    
        
        