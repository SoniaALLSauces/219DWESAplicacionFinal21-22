<?php

    /**
     * Clase REST, define los metodos necesarios para procesar los datos de la apiRest seleccionada
     *   en mi caso es http://api.weatherstack.com/
     *   la apiRest de compañero https://www.el-tiempo.net/api/
     *   la apiRest PROPIA http://daw219.ieslossauces.es/219DWESAplicacionFinal21-22/api/consultaDepartamentoPorCodigo.php?codDepartamento='.$codDepartamento
     * 
     * @author Sonia Anton Llanes
     * @created  26/01/2022
     * @updated  06/02/2022
     */


        class REST{
            /**
             * buscarDepartamento() - busca departamento a través de la api propia consultaDepartamentoPorCodigo.php
             * 
             * @param string $codDepartamento - codigo del departamento que consta de tres letras
             * @return \Departamento - devuelve un objeto departamento con los datos recogidos del json que devuelve la api
             *                      o null si no encuentra ningun departamento
             */
            public static function buscarDepartamento($codDepartamento){
                $oDepartamento= null; //creo el objeto departamento que me devuelve la funcion
                //Conecto con el web services consulta DepartamentoPorCodigo: http://daw219.sauces.local/219DWESAplicacionFinal21-22/api/consultaDepartamentoPorCodigo.php?codDepartamento=XXX añadiendo $codigoDepartamento
                    $ficheroDepartamento= file_get_contents('http://daw219.ieslossauces.es/219DWESAplicacionFinal21-22/api/consultaDepartamentoPorCodigo.php?codDepartamento='.$codDepartamento);  //devuelve un String del contenido JSON
                    $aJsonDepartamento= json_decode($ficheroDepartamento,true);   //decodificamos el json y lo devolvemos en un array
                    if ($aJsonDepartamento['respuesta']!=false){  //Si se produce algun error
                        $oDepartamento= new Departamento($aJsonDepartamento['codigo'], $aJsonDepartamento['descripcion'], $aJsonDepartamento['fechaAlta'], $aJsonDepartamento['volumenNeg'], $aJsonDepartamento['fechaBaja']);
                    }
                return $oDepartamento;
            }
            
            /**
             * Metodo buscarDepartamentoAlberto()
             * 
             * Metodo que permite buscar un departamento mediante un codigo de departamento
             * 
             * @param string $codDepartamento Codigo del departamento
             * @return \Departamento Un objeto Departamento
             */
            public static function buscarDepartamentoAlberto($codDepartamento){
                $resultadoAPI = @file_get_contents("http://daw207.ieslossauces.es/207DWESAplicaccionFinalAlberto2022/api/buscarDepartamento.php?codDepartamento={$codDepartamento}"); //La respuesta de la api en formato json
                if($resultadoAPI){
                    $JSONDecodificado = json_decode($resultadoAPI, true); //Almaceno la informacion decodificada obtenida de la url como un array
                            
                    if($JSONDecodificado['result'] == 'success'){
                        return new Departamento(
                            $JSONDecodificado['codDepartamento'],
                            $JSONDecodificado['descDepartamento'],
                            $JSONDecodificado['fechaCreacionDepartamento'],
                            $JSONDecodificado['volumenDeNegocio'],
                            $JSONDecodificado['fechaBajaDepartamento']
                        );
                    }
                    if($JSONDecodificado['result'] == 'unsuccessful'){
                        return $JSONDecodificado['mensajeError'];
                    }
                }
            }
            
            
            /**
             * buscarCiudad() - busca a traves de la apiRest http://api.weatherstack.com/ si existe en su base de datos la ciudad pasada por parámetro
             *    y nos devuelve un objeto de la clase Ciudad con los datos obtenidos del fichero Json que nos devuelve
             * 
             * @param string $ciudad - nombre de la ciudad introducida por parámetro
             * @return objet Ciudad - nos devuelve un objeto de la clase ciudad con los datos de la ciudad o si se procude algun error con el error recogido
             */
            public static function buscarCiudad($ciudad){
                //Conecto con el web services de: http://api.weatherstack.com/ añadiendo $ciudad
                    $fichero= file_get_contents('http://api.weatherstack.com/current?access_key=791b13a34544da4f5f1669e760434b77&query='.$ciudad);  //devuelve un String del contenido JSON
                    $aJson= json_decode($fichero,true);   //decodificamos el json y lo devolvemos en un array
                    if (isset($aJson['success']) && $aJson['success']==false){  //Si se produce algun error
                        $oCiudad= new Ciudad($ciudad, "_", "_", 0,null, null);
                        switch ($aJson['error']['code']){
                            case 101:
                            case 102:
                            case 103:
                            case 104:
                            case 105: 
                                $oCiudad->setError("Lo sentimos, se ha producido un error con la API"); 
                                break;
                            case 615: 
                                $oCiudad->setError("Introduzca una region correcta."); 
                                break;  
                        }
                        return $oCiudad;
                    }
                    else{  //si no hay error nos devuelve un objeto Ciudad con sus datos
                        return $oCiudad= new Ciudad($aJson['location']['name'], $aJson['location']['region'], $aJson['location']['country'], $aJson['current']['temperature'], $aJson['current']['weather_icons'][0], null);
                    }
            }
            
            
            /**
             * @author: Aroa Granero Omañas (https://github.com/aroago/208DWESProyectoFinal)
             * Created on: 31/1/2022
             * Funcion que devuelve un objeto provincia con los datos devueltos por la API. 
             * En caso de que el servidor de error devuelve null.
             * 
             * @param Int $codProvincia
             * @return \Provincia
             */
            public static function buscarProvincia($codProvincia) {
                $urlConcreta='https://www.el-tiempo.net/api/json/v2/provincias/'. $codProvincia;
                $oProvincia = null;
                $sResultadoRawData = false;
                $aHeaders = get_headers( $urlConcreta);   //get_header devuelve un array con las respuestas a una petición HTTP.Lo guardo en la variable headers
                $numHeaders = substr($aHeaders[0], 9, 3);      //substr devuelve una cadena, entonces quiero que recorra la posicion 0 del array aheaders
                if ($numHeaders == "200") {
                    $sResultadoRawData = file_get_contents( $urlConcreta);
                }
                if ($sResultadoRawData) {//si el servidor no ha dado fallo
                    $aJson = json_decode($sResultadoRawData, true); //decodificamos el json y lo devolvemos en un array
                    $oProvincia = new Provincia($aJson['title'],
                            $aJson['ciudades']['0']['idProvince'],
                            $aJson['ciudades']['0']['stateSky']['description'],
                            $aJson['today']['p'],
                            $aJson['ciudades']['0']['temperatures']['max'],
                            $aJson['ciudades']['0']['temperatures']['min']
                    );
                }

                return $oProvincia;//si ha dado error devuelve null.
            }
            
        }
            
