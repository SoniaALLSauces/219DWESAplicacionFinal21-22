<?php

    /**
     * Clase Departamento, define los atributos del objeto Departamento y metodos: constructor, getter y setter
     * 
     * @author Sonia Anton Llanes
     * @created  02/02/2022
     * @updated  02/02/2022
     */


        class Departamento{
            
        //Atributos:    
            private $codDepartamento;
            private $descDepartamento;
            private $fechaCreacionDepartamento;
            private $volumenDeNegocio;
            private $fechaBajaDepartamento;
            
        //Constructor
            /**
             * Metodo mágico __construct() - constructor de la clase Departamento
             * 
             * @param string $codDepartamento - codigo del departamento, se compone de 3 letras
             * @param string $descDepartamento - descripción/nombre del departamento
             * @param integer $fechaCreacionDepartamento - timestamp de la fecha en la cual se creo el departamento
             * @param float $volumenDeNegocio - volumen de negocio
             */
                public function __construct($codDepartamento,$descDepartamento,$fechaCreacionDepartamento,$volumenDeNegocio,$fechaBajaDepartamento) {
                    $this->codDepartamento = $codDepartamento;
                    $this->descDepartamento = $descDepartamento;
                    $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
                    $this->volumenDeNegocio = $volumenDeNegocio;
                    $this->fechaBajaDepartamento = $fechaBajaDepartamento;
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
             * getCodDepartamento() - devuelve el codigo del departamento
             * 
             * @return string $codDepartamento - codigo del departamento
             */    
                public function getCodDepartamento(){
                    return $this->codDepartamento;
                }
            /**
             * getDescDepartamento() - devuelve la descripcion/nombre del departamento
             * 
             * @return string $descDepartamento - descripcion/nombre del departamento
             */    
                public function getDescDepartamento(){
                    return $this->descDepartamento;
                }
            /**
             * getFechaCreacionDepartamento() - devuelve la fecha en la que se da de alta el departamento
             * 
             * @return integer $fechaCreacionDepartamento - fecha en la que se da de alta el departamento
             */    
                public function getFechaCreacionDepartamento(){
                    return $this->fechaCreacionDepartamento;
                }
            /**
             * getVolumenDeNegocio() - devuelve el volumen de negocio del departamento
             * 
             * @return float $volumenDeNegocio - volumen de negocio del departamento
             */    
                public function getVolumenDeNegocio(){
                    return $this->volumenDeNegocio;
                }
            /**
             * getFechaBajaDepartamento() - devuelve la fecha en la que se da de baja el departamento
             * 
             * @return integer $fechaBajaDepartamento - fecha en la que se da de baja el departamento
             */    
                public function getFechaBajaDepartamento(){
                    return $this->fechaBajaDepartamento;
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
             * setCodDepartamento() - modifica el codigo del departamento
             * 
             * @param string $codDepartamento - codigo del departamento
             */    
                public function setCodDepartamento($codDepartamento){
                    $this->codDepartamento = $codDepartamento;
                }
            /**
             * setDescDepartamento() - modifica la descripcion/nombre del departamento
             * 
             * @param string $descDepartamento - descripcion/nombre del departamento
             */    
                public function setDescDepartamento($descDepartamento){
                    $this->descDepartamento = $descDepartamento;
                }
            /**
             * setFechaCreacionDepartamento() - modifica la fecha en la que se da de alta el departamento
             * 
             * @param integer $fechaCreacionDepartamento - fecha en la que se da de alta el departamento
             */    
                public function setFechaCreacionDepartamento($fechaCreacionDepartamento){
                    $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
                }
            /**
             * setVolumenDeNegocio() - modifica el volumen de negocio del departamento
             * 
             * @param float $volumenDeNegocio - volumen de negocio del departamento
             */    
                public function setVolumenDeNegocio($volumenDeNegocio){
                    $this->volumenDeNegocio = $volumenDeNegocio;
                }
            /**
             * setFechaBajaDepartamento() - modifica la fecha en la que se da de baja el departamento
             * 
             * @param integer $fechaBajaDepartamento - fecha en la que se da de baja el departamento
             */    
                public function setFechaBajaDepartamento($fechaBajaDepartamento){
                    $this->fechaBajaDepartamento = $fechaBajaDepartamento;
                }

        }
        