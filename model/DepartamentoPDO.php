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
             * buscaDepartamentosPorDesc() - busca en la tabla Departamentos si existe algun registro/s que contenga la descripción pasada por parámetro
             * 
             * @param string $descDepartamento - descripcion del departamento
             * @return \Departamento - objeto Departamento con los datos del registro encontrado
             */
            public static function buscaDepartamentosPorDesc($descDepartamento,$estado,$numRegistro=0,$limitRegistros=0) {
                $aODepartamento;  //array para guardar los objetos Departamento
                switch ($estado){
                    case "todos": 
                            if($limitRegistros!=0){
                                $consultaSQL = <<<EOD
                                   SELECT * FROM T02_Departamento WHERE 
                                   T02_DescDepartamento LIKE '%{$descDepartamento}%'
                                   LIMIT {$numRegistro},{$limitRegistros};
                                 EOD;
                            } else{
                                $consultaSQL = <<<EOD
                                   SELECT * FROM T02_Departamento WHERE 
                                   T02_DescDepartamento LIKE '%{$descDepartamento}%';
                                 EOD;
                            }
                            break;
                    case "alta":
                            if($limitRegistros!=0){
                                $consultaSQL = <<<EOD
                                   SELECT * FROM T02_Departamento WHERE 
                                   T02_DescDepartamento LIKE '%{$descDepartamento}%' AND
                                   T02_FechaBajaDepartamento IS NULL
                                   LIMIT {$numRegistro},{$limitRegistros};
                                 EOD;
                            } else{
                                $consultaSQL = <<<EOD
                                   SELECT * FROM T02_Departamento WHERE 
                                   T02_DescDepartamento LIKE '%{$descDepartamento}%' AND
                                   T02_FechaBajaDepartamento IS NULL;
                                 EOD;
                            }
                            break;
                    case "baja": 
                            if($limitRegistros!=0){
                                $consultaSQL = <<<EOD
                                   SELECT * FROM T02_Departamento WHERE 
                                   T02_DescDepartamento LIKE '%{$descDepartamento}%' AND
                                   T02_FechaBajaDepartamento IS NOT NULL
                                   LIMIT {$numRegistro},{$limitRegistros};
                                 EOD;
                            } else{
                                $consultaSQL = <<<EOD
                                   SELECT * FROM T02_Departamento WHERE 
                                   T02_DescDepartamento LIKE '%{$descDepartamento}%' AND
                                   T02_FechaBajaDepartamento IS NOT NULL;
                                 EOD;
                            }
                            break;
                }
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
            
        }
        