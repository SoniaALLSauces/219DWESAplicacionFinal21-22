<?php

    /**
     * Clase REST, define los metodos necesarios para procesar los datos de la apiRest seleccionada
     *   en mi caso es http://api.weatherstack.com/
     * 
     * @author Sonia Anton Llanes
     * @created  26/01/2022
     * @updated  27/01/2022
     */


        class REST{
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
                        $oCiudad= new Ciudad($ciudad, "_", "_", 0, null);
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
                        return $oCiudad= new Ciudad($aJson['location']['name'], $aJson['location']['region'], $aJson['location']['country'], $aJson['current']['temperature'], null);
                    }
            }
            
        }
            
