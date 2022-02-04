
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

        </div>
    </section>
