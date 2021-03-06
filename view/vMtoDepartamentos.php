<!--  Author: Sonia Antón Llanes
  --  Created on: 02-febrero-2022
  --  Last Modify: 04-febrero-2022
  --  vMtoDepartamentos PROYECTO FINAL: $_SESSION['pagina'] tiene como valor mtoDepartamentos : mostramos el formulario
  -->


    <section class="mtoDepartamentos">
        
        <div class="volver">
            <form name="volver" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input id="volver" name="volver" type="submit" value="">
            </form>
        </div>

        <div class="div">
            <h2>Mantenimiento de Departamentos</h2>
            
            <form name="formularioDepartamentos" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="FormMtoDptos">
                    <table>
                        <tr>
                            <td><h3>Mantenimiento de Departamentos</h3></td>
                            <td class="botonesDpto">
                                <button>Añadir</button>
                                <button>Exportar</button>
                                <button>Importar</button>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">Busqueda por Descripción y/o Estado:</th>
                        </tr>
                        <tr class="trDto">
                            <th colspan="2" class="tdDescDto">
                                <input type="text" name="descDepartamento" id="LbDescDepartamento" placeholder="introduzca descripción"
                                       value="<?php  //Si no hay ningun error y se ha enviado mantenerlo
                                           echo $resultado = ($aErrores['descDepartamento']==NULL && isset($_REQUEST['descDepartamento'])) ? $_REQUEST['descDepartamento'] : $aRespuestas['descDepartamento']=""; 
                                           ?>">
<!--                            </th>
                            <th colspan="2" class="radio">-->
                                <h3 class="h3Dep">Estado: 
                                    <input type="radio" name="muestroDep" value="todos">Todos
                                    <input type="radio" name="muestroDep" value="alta">Alta
                                    <input type="radio" name="muestroDep" value="baja">Baja   
                                </h3>
<!--                            </th>
                            <th class="buscarDto">-->
                                <input id="buscarDto" name="buscarDto" type="submit" value="">
                            </th>
                        </tr>
                    </table>
                </div>
            </form>
            
            <div class="tableDepartamentos">
                <table>
                    <tr>
                        <th colspan="5"><h3 class="h3Dep">Departamentos: <span class="estado"> <?php echo strtoupper($aRespuestas['estado']); ?> </span> 
                            </h3></th>
                    </tr>
                    <tr class="tr">
                        <th class="datosDep">Codigo</th>
                        <th class="datosDep">Departamento</th>
                        <th class="datosDep">Fecha Alta</th>
                        <th class="datosDep">Fecha Baja</th>
                        <th class="datosDep">Volumen Neg.</th>
                        <td class="th">
                        <th colspan="3"></th>
                    </tr>
                    
                <?php
                    //Recorro el array de Departamentos
                    //Y Muestro la tabla Departametos con los encontrados o entera (por defecto)
                    foreach ($aDepartamentos as $departamento) {
                ?>
                    <tr class="tr">
                        <td class="datosDep"> <?php echo $departamento['codDepartamento']; ?> </td>
                        <td class="datosDep"> <?php echo $departamento['descDepartamento']; ?> </td>
                        <td class="datosDep"> <?php echo $departamento['fechaAlta']; ?>
                        <td class="datosDep"> <?php echo $departamento['fechaBaja']; ?> </td>
                        <td class="datosDep"> <?php echo $departamento['volumenNeg']; ?> </td>
                    <form name="mtoDepartamento" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <!--<td class="th"><img class="imgtd" src="webroot/images/editar.png" alt="editar"></td>-->
                        <td class="th"><button type="submit" name="editarDto" value="<?php echo $departamento['codDepartamento']; ?>">
                                <img class="imgtd" src="webroot/images/editar.png" alt="editar">
                        </button></td>
                        <?php if ($departamento['fechaBaja']!=null){ ?>
                            <td class="th"><button type="submit" name="altaDto" value="<?php echo $departamento['codDepartamento']; ?>">
                                    <img class="imgtd" src="webroot/images/top.png" alt="reactivar">
                            </button></td>
                        <?php } else{ ?>
                            <td class="th"><button type="submit" name="bajaDto" value="<?php echo $departamento['codDepartamento']; ?>">
                                    <img class="imgtd" src="webroot/images/down.png" alt="darBaja">
                            </button></td>
                        <?php }?> 
                            <td class="th"><img class= "imgtd" src="webroot/images/eliminar.png" alt="eliminar"></td>
                        </tr>
                    </form>
                <?php
                    }
                ?>
                    <tr>
                        <th colspan="8">
                            <form name="paginar" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                <span class="pagMenos"> <input id="pagFirst" type="submit" name="primeraPagina" value=""> </span>
                                <span class="pagMenos"> <input id="pagMenos" type="submit" name="paginaMenos" value=""> </span>
                                <span class="pagNum"> <?php echo $pagRegistros+1 ." de ".  $maxPaginas; ?> </span>
                                <span class="pagMas"> <input id="pagMas" type="submit" name="paginaMas" value=""> </span>
                                <span class="pagMas"> <input id="pagEnd" type="submit" name="ultimaPagina" value=""> </span>
                            </form>
                        </th>
                    </tr>
                </table>
            </div>

        </div>
    </section>