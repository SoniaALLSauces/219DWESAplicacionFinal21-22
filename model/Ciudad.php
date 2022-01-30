<?php

    /**
     * Clase Ciudad, define los atributos del objeto Ciudad y metodos: constructor, getter y setter
     * 
     * @author Sonia Anton Llanes
     * @created  28/01/2022
     * @updated  28/01/2022
     */


        class Ciudad{
            
        //Atributos:    
            private $ciudad;
            private $region;
            private $pais;
            private $temperatura;
            private $error;
            
        //Constructor
            /**
             * Metodo mágico __construct() - constructor de la clase Usuario
             * 
             * @param string $ciudad - ciudad introducida por el usuario
             * @param string $region - region a la que pertenece la ciudad
             * @param string $pais - pais de la ciudad
             * @param integer $temperatura - temperatura de la ciudad en tiempo real
             * @param string $error - si se produce algun error se recoge
             */
                public function __construct($ciudad,$region,$pais,$temperatura,$error) {
                    $this->ciudad = $ciudad;
                    $this->region = $region;
                    $this->pais = $pais;
                    $this->temperatura = $temperatura;
                    $this->error = $error;
                }
            
        //Getter
            /**
             * Metodo mágico __get() - devuelve el valor del atributo pasado por parámetro
             * 
             * @param @var $atributo - atributo de la clase Usuario que deseamos conocer
             * @return string,int - devuelve el valor del atributo indicado
             */
                public function __get($atributo) {
                    return $this->$atributo;
                }
            /**
             * getCiudad() - devuelve el nombre de la ciudad que introdujo el usuario
             * 
             * @return string $ciudad - nombre de la ciudad buscada
             */    
                public function getCiudad(){
                    return $this->ciudad;
                }
            /**
             * getRegion() - devuelve el nombre de la region a la que pertenece la ciudad
             * 
             * @return string $region - nombre de la region a la que pertenece la ciudad
             */    
                public function getRegion(){
                    return $this->region;
                }
            /**
             * getPais() - devuelve el nombre del pais de la ciudad
             * 
             * @return string $pais - nombre del pais de la ciudad
             */    
                public function getPais(){
                    return $this->pais;
                }
            /**
             * getTemperatura() - devuelve el nombre del pais de la ciudad
             * 
             * @return integer $temperatura - temperatura actual de la ciudad
             */    
                public function getTemperatura(){
                    return $this->temperatura;
                }
            /**
             * getError() - devuelve el error si existe o null
             * 
             * @return integer $error - error
             */    
                public function getError(){
                    return $this->error;
                }


         
            //Setter
            /**
             * Metodo mágico __set() - modifica el valor del atributo, ambos pasados por parámetro
             * 
             * @param @var $atributo - atributo que se desea modificar
             * @param string,int $valor - nuevo valor que se quiere dar al atributo
             */
                public function __set($atributo, $valor){
                    $this->$atributo = $valor;
                }
            /**
             * setTemperatura() - modifica la  temperatura que hay en este momento en la esta ciudad
             * 
             * @param integer $temperatura - temperatura actual de la ciudad
             */    
                public function setTemperatura($temperatura){
                    $this->temperatura = $temperatura;
                }
            /**
             * setError() - modifica el error si se a dado existe o null si no existe
             * 
             * @param integer $error - error
             */    
                public function setError($error){
                    $this->error = $error;
                }

        }
        