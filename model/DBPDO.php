<?php

    /**
     * @author Sonia Anton Llanes
     * @created  21/01/2022
     * @updated  21/01/2022
     */


     /**
      * @class DBPDO
      */
         
        class DBPDO{
            /**
             * Summary, Ejecuta una consulta a la base de datos pasada en la conexion
             * 
             * Description, Se realiza una consulta a la base de datos que le pasamos a través de una conexión PDO
             *   los parámetros de la conexión han de estar indicados en variables anteriormente definidas
             * 
             * @param string $entrada_sentenciaSQL - variable, heredoc, que contiene la sentecia sql a ejecutar
             * @param array $entrada_parametros - array con los parámetros que se le pasan a la consulta SQL
             * @return object PDOStatement - devuelve un objeto de la clase PDOStatment con los datos del registro de la consulta, o null si esta vacio
             */
            public static function ejecutaConsulta($entrada_sentenciaSQL, $entrada_parametros) {
                try{
                    $miDB = new PDO (HOST, USER, PASSWORD);  //establezco conexión con objeto PDO 
                    $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //y siempre lanzo excepción utilizando manejador propio PDOException cuando se produce un error
                    
                    $consulta = $miDB -> prepare($entrada_sentenciaSQL);  //preparo la consulta, con consulta preparada
                    $consulta -> execute($entrada_parametros);             //ejecuto la consulta, con parámetros si existen
                }
                catch (PDOException $excepcion){  //codigo si se produce error utilizando PDOException
                    $consulta = null;
                    echo "<p>Error: ".$excepcion->getCode()."</p>";     //getCode() nos devuelve el codigo del error que salte
                    echo "<p style='color: red'>Código del error: ".$excepcion->getMessage()."</p>";  //getMessage() nos devuelve el mensaje que genera el error que saltó
                }
                finally {  
                    unset($miDB);  //finalizamos conexion con database
                }
                
                return $consulta;
            }
        }