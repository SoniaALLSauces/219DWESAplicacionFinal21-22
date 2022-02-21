<?php

    /**
     * Clase Usuario, define los atributos del objeto Usuario y metodos: constructor, getter y setter
     * 
     * @author Sonia Anton Llanes
     * @created  21/01/2022
     * @updated  24/01/2022
     */


        class Usuario{
            
        //Atributos:    
            private $codUsuario;
            private $password;
            private $descUsuario;
            private $numConexiones;
            private $fechaHoraUltimaConexion;
            private $fechaHoraUltimaConexionAnterior;
            private $perfil;
            private $imagenUsuario;
            private $listaOpinionesUsuario;
            
        //Constructor
            /**
             * Metodo mágico __construct() - constructor de la clase Usuario
             * 
             * @param string $codUsuario - codigo del usuario 
             * @param string $password - contraseña/password del usuario
             * @param string $descUsuario - nombre y apellidos del usuario
             * @param integer $numConexiones - numero de veces que el usuario se ha logeado correctamente
             * @param integer $fechaHoraUltimaConexion - timestamp de la ultima vez que el usuario se ha logeado correctamente
             * @param integer $fechaHoraUltimaConexionAnterior - timestamp de la conexión anterior a la ultima vez que el usuario se ha logeado correctamente
             * @param string $perfil - puede tomar dos valores 'usuario' o 'administrador'
             * @param type $imagenUsuario
             * @param type $listaOpinionesUsuario
             */
                public function __construct($codUsuario,$password,$descUsuario,$numConexiones,$fechaHoraUltimaConexion,$fechaHoraUltimaConexionAnterior,$perfil,$imagenUsuario,$listaOpinionesUsuario) {
                    $this->codUsuario = $codUsuario;
                    $this->password = $password;
                    $this->descUsuario = $descUsuario;
                    $this->numConexiones = $numConexiones;
                    $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
                    $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
                    $this->perfil = $perfil;
                    $this->imagenUsuario = $imagenUsuario;
                    $this->listaOpinionesUsuario = $listaOpinionesUsuario;
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
             * getCodUsuario() - devuelve el codigo de este codUsuario
             * 
             * @return string $codUsuario - codigo del usuario
             */    
                public function getCodUsuario(){
                    return $this->codUsuario;
                }
            /**
             * getDescUsuario() - devuelve la descripción de este descUsuario
             * 
             * @return string $descUsuario - descripción del usuario
             */
                public function getDescUsuario(){
                    return $this->descUsuario;
                }
            /**
             * getNumConexiones() - devuelve el valor del numero de veces que el usuario se ha conectado/logeado correctamente
             * 
             * @return integer $numConexiones - veces que el usuario se ha conectado
             */
                public function getNumConexiones(){
                    return $this->numConexiones;
                }
            /**
             * getFechaHoraUltimaConexion() - devuelve el timestamp de la ultima conexión
             * 
             * @return integer $fechaHoraUltimaConexion - el timestamp de la ultima conexión
             */
                public function getFechaHoraUltimaConexion(){
                    return $this->fechaHoraUltimaConexion;
                }
            /**
             * getFechaHoraUltimaConexionAnterior() - devuelve el timestamp de la ultima conexión anterior
             * 
             * @return integer $fechaHoraUltimaConexionAnterior - el timestamp de la ultima conexión anterior
             */
                public function getFechaHoraUltimaConexionAnterior(){
                    return $this->fechaHoraUltimaConexionAnterior;
                }
            /**
             * getPerfil() - devuelve el perfil del usuario
             * 
             * @return string $perfil - puede tomar dos valores 'usuario' o 'administrador'
             */
                public function getPerfil(){
                    return $this->perfil;
                }
            /**
             * getImagenUsuario() - devuelve la imagen del usuario
             * 
             * @return type $imagenUsuario - imagen del usuario
             */    
                public function getImagenUsuario(){
                    return $this->imagenUsuario;
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
             * setDescUsuario() - modifica la descripcion (nombre y apellidos) del usuario conectado/logeado correctamente
             * 
             * @param string $descUsuario - descripcion (nombre y apellidos) del usuario que se ha conectado/logeado correctamente
             */    
                public function setDescUsuario($descUsuario){
                    $this->descUsuario = $descUsuario;
                }    
            /**
             * setNumConexiones() - modifica el valor del numero de veces que el usuario se ha conectado/logeado correctamente
             * 
             * @param integer $numConexiones - numero de veces que el usuario se ha conectado/logeado correctamente
             */    
                public function setNumConexiones($numConexiones){
                    $this->numConexiones = $numConexiones;
                }
            /**
             * setFechaHoraUltimaConexion() - modifica el timestamp de la ultima conexión
             * 
             * @param integer $fechaHoraUltimaConexion - timestamp de la ultima conexión
             */
                public function setFechaHoraUltimaConexion($fechaHoraUltimaConexion){
                    $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
                }
            /**
             * setFechaHoraUltimaConexionAnterior() - modifica el timestamp de la ultima conexión anterior
             *    antes de modificar $fechaHoraUltimaConexion no lo quiero perder y lo guardamos en $fechaHoraUltimaConexionAnterior
             * 
             * @param integer $fechaHoraUltimaConexionAnterior - el timestamp de la ultima conexión anterior
             */
                public function setFechaHoraUltimaConexionAnterior($fechaHoraUltimaConexionAnterior){
                    $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
                }
                
        }
        