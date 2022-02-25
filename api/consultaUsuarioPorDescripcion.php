<?php

    /**
     * Api Rest Consultar Departamento por Código
     *   url local http://daw219.sauces.local/219DWESAplicacionFinal21-22/api/consultaUsuarioPorDescripcion.php?descUsuario=valor
     *   url internet https://daw219.ieslossauces.es/219DWESAplicacionFinal21-22/api/consultaUsuarioPorDescripcion.php?descUsuario=valor
     * 
     * @author Sonia Anton Llanes
     * @created  06/02/2022
     * @updated  09/02/2022
     */

    
    //Importamos todos los archivos necesarios
        require_once '../config/confDB.php';
        require_once '../model/DBPDO.php';
        require_once '../model/Usuario.php';
        require_once '../model/UsuarioPDO.php';


// FORMULARIO: Esta api da resultado cuando se consuta desde un formulario
    $entradaOK = true;  //Variable para indicar que el formulario esta correcto
        if (isset($_GET['descUsuario'])){
            //Consulto si existen usuarios con esa descripcion en mi tabla, sino buscaUsuariosPorDesc no devuelve null
                $arrayUsuarios= UsuarioPDO::buscaUsuariosPorDesc($_GET['descUsuario']);
                    if ($arrayUsuarios){  //si la busqueda tiene algun usuario recorro el array de objetos y lo guardo en un array numerico con arrays asociativos por cada usuario 
                        foreach ($arrayUsuarios as $usuario) {
                            $aUsuarios[]= [
                                'respuesta' => true,
                                'codigo' => $usuario->getCodUsuario(),
                                'descripcion' => $usuario->getDescUsuario(),
                                'numConexiones' => $usuario->getNumConexiones(),
                                'ultimaConexion' => $usuario->getFechaHoraUltimaConexion(),
                                'perfil' => $usuario->getPerfil(),
                                'imagen' => $usuario->getImagenUsuario()
                            ];
                        }
                            
                         
                    }
                    else{
                        $aUsuarios= [
                            'respuesta' => false,
                            'mensaje' => "no se ha encontrado ningun usuario con esa descripcion"
                        ];
                    }
        } 
        else{  //aun no se ha pulsado el boton enviar
            $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
        }

        if($entradaOK){  //Si la entrada es correcta
            //Devuelvo un json con los datos de los usuarios
            echo json_encode($aUsuarios); 
        }   

      