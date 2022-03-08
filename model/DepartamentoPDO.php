<?php

    /**
     * Clase DepartamentoPDO, con los metodos necesarios para buscar, alta, modificacion y baja de un objeto Departamento
     * 
     * @author Sonia Anton Llanes
     * @created  02/02/2022
     * @updated  02/02/2022
     */

     
        class DepartamentoPDO{
            /**
             * buscaDepartamentoPorCod() - busca en la tabla Departamentos si existe algun registro con el código pasado por parámetro
             * 
             * @param string $codDepartamento - codigo del departamento
             * @return \Departamento - objeto Departamento con los datos del registro encontrado
             */
            public static function buscaDepartamentoPorCod($codDepartamento) {
                $oDepartamento=null; //variable para guardar los datos del Departamento
                $consultaSQL = <<<EOD
                                   SELECT * FROM T02_Departamento WHERE 
                                   T02_CodDepartamento=:codDepartamento;
                                 EOD;
                $parametros = [':codDepartamento' => $codDepartamento];
                $rdoConsulta = DBPDO::ejecutaConsulta($consultaSQL, $parametros);
                    if ($rdoConsulta->rowCount()>0){  //si encuentra el registro departamento
                        $departamentoPDOStatment = $rdoConsulta ->fetchObject();  //guardo todos los datos del registro encontrado
                        //Instancio un objeto Departamento
                        $oDepartamento= new Departamento($departamentoPDOStatment->T02_CodDepartamento, $departamentoPDOStatment->T02_DescDepartamento, $departamentoPDOStatment->T02_FechaCreacionDepartamento, $departamentoPDOStatment->T02_VolumenDeNegocio, $departamentoPDOStatment->T02_FechaBajaDepartamento);
                    } 
                return $oDepartamento;
            }
            
            /**
             * buscaDepartamentosPorDesc() - busca en la tabla Departamentos según descripción y estado,
             *     y opcional se puede indicar un numero limite de registros para traernos y la posición del registro del cual comienza 
             * 
             * @param type $descDepartamento - cadena de letras que sirve de filtro para buscar registros
             * @param type $estado - que puede ser "todos", "alta" o "baja"
             * @param type $numRegistro - 
             * @param type $limitRegistros - maximo limite de registros que me traigo
             * @return \Departamento - objeto Departamento con los datos del registro encontrado
             */
            public static function buscaDepartamentosPorDesc($descDepartamento,$estado,$numRegistro=0,$limitRegistros=0) {
                $aODepartamento=null;  //array para guardar los objetos Departamento
                //ESTADO
                switch ($estado){
                    case "todos": 
                            $estadosql= "";
                            break;
                    case "alta":
                            $estadosql= "AND T02_FechaBajaDepartamento IS NULL";
                            break;
                    case "baja": 
                            $estadosql= "AND T02_FechaBajaDepartamento IS NOT NULL";
                            break;
                }
                //LIMITE REGISTROS
                if($limitRegistros==0){ 
                    $limit= ""; 
                } else{ 
                    $limit= " LIMIT {$numRegistro},{$limitRegistros} "; 
                }
                //CONSULTA
                $consultaSQL = <<<EOD
                                   SELECT * FROM T02_Departamento WHERE 
                                   T02_DescDepartamento LIKE '%{$descDepartamento}%' 
                                   {$estadosql} {$limit};
                                 EOD;
                //$parametros = [':descDepartamento' => $descDepartamento];
                $rdoConsulta = DBPDO::ejecutaConsulta($consultaSQL);
                  
                $departamentoPDOStatment = $rdoConsulta ->fetchObject();  //guardo todos los datos del registro encontrado
                    while ($departamentoPDOStatment){  //si encuentra el registro departamento
                        //Instancio un objeto Departamento
                        $oDepartamento= new Departamento($departamentoPDOStatment->T02_CodDepartamento, $departamentoPDOStatment->T02_DescDepartamento, $departamentoPDOStatment->T02_FechaCreacionDepartamento, $departamentoPDOStatment->T02_VolumenDeNegocio, $departamentoPDOStatment->T02_FechaBajaDepartamento);
                        $aODepartamento[]= $oDepartamento;
                        //Y avanzo puntero:
                        $departamentoPDOStatment = $rdoConsulta ->fetchObject();  //guardo todos los datos del registro encontrado
                    } 
                return $aODepartamento;
            }
            
            /**
             * contadorDepartamentos() - metodo para contar registros por descripcion y estado sin necesidad de traerlos
             * 
             * @param type $descDepartamento - cadena de letras que sirve de filtro para buscar registros
             * @param type $estado - que puede ser "todos", "alta" o "baja"
             * @return int $contadorRegistros - nos devuelve el numero de registros encontrados
             */
            public static function contadorDepartamentos($descDepartamento,$estado) {
                $contador= null;   //variable para guardar el numero de registros que coinciden con la seleccion
                switch ($estado){
                    case "todos": 
                            $estadosql= "";
                            break;
                    case "alta":
                            $estadosql= "AND T02_FechaBajaDepartamento IS NULL";
                            break;
                    case "baja": 
                            $estadosql= "AND T02_FechaBajaDepartamento IS NOT NULL";
                            break;
                }
                $consultaSQL = <<<EOD
                               SELECT COUNT(*) FROM T02_Departamento WHERE 
                               T02_DescDepartamento LIKE '%{$descDepartamento}%' 
                               {$estadosql};
                             EOD;
                $rdoContar = DBPDO::ejecutaConsulta($consultaSQL);
                $contador = $rdoContar ->fetch();                   
                return $contador[0];
            }
            
            
            public static function bajaLogicaDepartamento($codDepartamento) {
                $consultaSQL = <<<EOD
                                    UPDATE T02_Departamento SET 
                                    T02_FechaBajaDepartamento = CURDATE()
                                    WHERE T02_CodDepartamento='{$codDepartamento}';
                                EOD;
                $bajaDepartamento = DBPDO::ejecutaConsulta($consultaSQL);                
                
                if($bajaDepartamento){ return true; }
                else { return false; }
            }
            
            
            public static function rehabilitarDepartamento($codDepartamento) {
                $consultaSQL = <<<EOD
                                    UPDATE T02_Departamento SET 
                                    T02_FechaCreacionDepartamento = CURDATE(),
                                    T02_FechaBajaDepartamento = null
                                    WHERE T02_CodDepartamento='{$codDepartamento}';
                                EOD;
                $altaDepartamento = DBPDO::ejecutaConsulta($consultaSQL);                
                
                if($altaDepartamento){ return true; }
                else { return false; }
            }
            
            public static function modificaDepartamento($codDepartamento,$descripcion,$volumen) {
                //Actualizo los datos modificando descripcion y volumen
                    $sqlUpdate = <<<EOD
                                      UPDATE T02_Departamento SET 
                                        T02_DescDepartamento='{$descripcion}',
                                        T02_VolumenDeNegocio='{$volumen}'
                                      WHERE T02_CodDepartamento='{$codDepartamento}';
                                    EOD;
                    $rdoUpdate = DBPDO::ejecutaConsulta($sqlUpdate);
                
                if($rdoUpdate){ return true; }
                else { return false; }
            }
            
        }
        