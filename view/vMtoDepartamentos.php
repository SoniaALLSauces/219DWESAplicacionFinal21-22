
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
            
            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="FormMtoDptos">
                    <table>
                        <tr class="trDto">
                            <td class="datoDto">
                                <label for="LbDescDepartamento">Descripción del Departamento </label>
                            </td>
                            <td colspan="2" class="tdDescDto">
                                <input type="text" name="descDepartamento" id="LbDescDepartamento"
                                       value="<?php  //Si no hay ningun error y se ha enviado mantenerlo
                                                echo $resultado = ($aErrores['descDepartamento']==NULL && isset($_REQUEST['descDepartamento'])) ? $_REQUEST['descDepartamento'] : $aRespuestas['descDepartamento']=""; 
                                              ?>">
                            </td>
                            <td class="buscarDto"><input id="buscarDto" name="buscarDep" type="submit" value=""></td>
                        </tr>
                        <tr>
                            <td class="dato"></td>
                            <td colspan="2" class="td">
                                <div class="error"><?php
                                        if ($aErrores['descDepartamento'] != NULL) { //si hay errores muestra el mensaje
                                            echo "<span style=\"color:red;\">".$aErrores['descDepartamento']."</span>"; //aparece el mensaje de error que tiene el array aErrores
                                        }
                                     ?></div>
                            </td>
                            <td class="buscar"></td>
                        </tr>
                    </table>
                </div>
            </form>
            
            <div class="tableDepartamentos">
                <table>
                    <tr>
                        <th colspan="5"><h3 class="h3Dep">Departamentos:</h3></th>
                    </tr>
                    <tr class="tr">
                        <th class="cod">Codigo</th>
                        <th class="dep">Departamento</th>
                        <th class="falta">Fecha Alta/Reactivación</th>
                        <th class="fbaja">Fecha Baja</th>
                        <th class="vneg">Volumen Negocio</th>
                        <th colspan="3"></th>
                    </tr>
                    
                    <tr>
                        <th colspan="5">
                            <?php print_r($aDepartamentos); ?>
                        </th>
                    </tr>
                <?php
                    //Recorro el array de Departamentos
                    //Y Muestro la tabla Departametos con los encontrados o entera (por defecto)
                    foreach ($aDepartamentos as $departamento) {
                ?>
                    <tr class="tr">
                        <td> <?php echo $departamento[codDepartamento]; ?> </td>
                        <td> <?php echo $departamento[descDepartamento]; ?> </td>
                        <td> <?php echo $departamento[fechaAlta]; ?> </td>
                        <td> <?php echo $departamento[fechaBaja]; ?> </td>
                        <td> <?php echo $departamento[volumenNegocio]; ?> </td>
                        <td><img class= "imgtd" src="webroot/images/editar.png" alt="editar"></td>
                        <td><img class= "imgtd" src="webroot/images/eliminar.png" alt="eliminar"></td>
                        <td><img class= "imgtd" src="webroot/images/ojo-mostar.png" alt="mostrar"></td>
                    </tr>
                <?php
                    }
                ?>
            
                </table>
            </div>

        </div>
    </section>
