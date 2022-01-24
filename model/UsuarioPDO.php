<?php

    /**
     * Clase UsuarioPDO, con los metodos necesarios para alta,modificacion y baja de un objeto Usuario
     * 
     * @author Sonia Anton Llanes
     * @created  24/01/2022
     * @updated  24/01/2022
     */

     
        class UsuarioPDO{
            /**
             * validarUsuario() - comprueba en la base de datos si el codigo de usuario y su contraseña se han escrito correctamente
             * 
             * @param string $entrada_codUsuario - codigo con el que el usuario está registrado
             * @param string $entrada_password - password con el que el usuario está registrado
             * @return object vacio=null si no se ha encontrado ningun usuario
             *                o el objeto Usuario con los atributos del usuario encontrado
             */
            public static function validarUsuario($entrada_codUsuario, $entrada_password) {
                $oUsuario=null; //variable para guardar los datos del usuario
                $consultaSQL = <<<EOD
                                   SELECT * FROM T01_Usuario WHERE 
                                   T01_CodUsuario=:usuario AND 
                                   T01_Password=:password;
                                 EOD;
                $parametros = [':usuario' => $entrada_codUsuario,
                               ':password' => hash('sha256',($entrada_codUsuario.$entrada_password))];
                    
                $rdoConsulta = DBPDO::ejecutaConsulta($consultaSQL, $parametros);
                    if ($rdoConsulta->rowCount()>0){  //si encuentra el registro (usuario y contraseña)
                        $usuarioPDOStatment = $rdoConsulta ->fetchObject();  //guardo todos los datos del registro encontrado
                        //Instancio un objeto usuario
                        $oUsuario= new Usuario($usuarioPDOStatment->T01_CodUsuario, $usuarioPDOStatment->T01_Password, $usuarioPDOStatment->T01_DescUsuario, $usuarioPDOStatment->T01_NumConexiones, $usuarioPDOStatment->T01_FechaHoraUltimaConexion, null, $usuarioPDOStatment->T01_Perfil);
                    } 
                return $oUsuario;
            }
            
            /**
             * registrarUltimaConexion() - modifica en el objeto usuario el numero de conexiones establecidas y la fecha/hora de la ultima conexion
             * 
             * @param objeto $oUsuario - pasamos el objeto Usuario que queremos modificar
             * @return objeto $oUsuario - devuelve el objeto Usuario modificado
             */
            public static function registrarUltimaConexion($oUsuario){
                //Actualizo los datos: fecha/hora ultima conexion en base de datos 
                    $sqlUpdate = <<<EOD
                                      UPDATE T01_Usuario SET 
                                        T01_NumConexiones = T01_NumConexiones+1,
                                        T01_FechaHoraUltimaConexion = :ultimaconexion
                                      WHERE T01_CodUsuario=:codUsuario;
                                    EOD;
                        $fechaAhora = new DateTime();  //variable para guardar la fecha y hora del momento de la conexion
                        $ahora = $fechaAhora->getTimestamp();
                    $parametros = [':ultimaconexion' => $ahora,
                                   ':codUsuario' => $oUsuario->getCodUsuario()];
                    $rdoUpdate = DBPDO::ejecutaConsulta($sqlUpdate, $parametros);
                //Actualizo el objeto $oUsuario
                    $numConexiones= $oUsuario->getNumConexiones()+1;
                    $oUsuario->setNumConexiones($numConexiones);
                    $oUsuario->setFechaHoraUltimaConexion($ahora);
                return $oUsuario;  //devuelvo el usuario actualizado
            }
            
            public static function altaUsuario(){
                
            }
            
            public static function modificarUsuario(){
                
            }
            
            public static function cambiarPassword(){
                
            }
            
            public static function borrarUsuario(){
                
            }
            
            public static function validarCodNoExiste(){
                
            }
            
        }