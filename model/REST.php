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
            
            function buscarCiudad($ciudad){
                //Conecto con el web services de: http://api.weatherstack.com/ añadiendo $ciudad
                    $fichero= file_get_contents('http://api.weatherstack.com/current?access_key=791b13a34544da4f5f1669e760434b77&query='.$ciudad);//devuelve un String del contenido JSON
                    $aJson=json_decode($fichero,true);//decodificamos el json y lo devolvemos en un array
                    
            }
        }
            