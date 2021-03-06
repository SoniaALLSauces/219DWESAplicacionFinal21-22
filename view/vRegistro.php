
<!--  Author: Sonia Antón Llanes
  --  Created on: 31-enero-2022
  --  Last Modify: 31-enero-2022
  --  vRegistro PROYECTO LOGIN LOGOUT: $_SESSION['pagina'] tiene como valor registro : mostramos el formulario
  -->


    <section class="login">
        
        <div class="volver">
            <form name="volver" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input id="volver" name="volver" type="submit" value="">
            </form>
        </div>

        <div class="divRegistro">
            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table class="tFormulario">
                    <tr>
                        <th colspan="2"><h3>REGISTRO</h3></th>
                    </tr>
                    <tr>
                        <td colspan="2" class="datoR"><label for="LbUsuario">Usuario <span class="ast">*</span></label></td>
                    </tr>
                    <tr class="borderTR">
                        <td class="datoUsu"><input type="text" name="usuario" id="LbUsuario"
                            value="<?php  //Si no hay ningun error y se ha enviado un valor mantenerlo
                                echo $resultado = ($aErrores['usuario']==NULL && isset($_REQUEST['usuario'])) ? $_REQUEST['usuario'] : ""; 
                              ?>"></td>
                        <td class="errorR"><?php
                                if ($aErrores['usuario']!=NULL) { //si hay errores muestra el mensaje
                                    echo "<span style=\"color:red;\">".$aErrores['usuario']."</span>"; //aparece el mensaje de error que tiene el array aErrores
                                }
                            ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="datoR"><label for="LbDescUsuario">Nombre y Apellidos <span class="ast">*</span></label></td>
                    <tr>
                    <tr>
                        <td colspan="2" class="datoUsu"><input type="text" name="descUsuario" id="LbDescUsuario"
                            value="<?php  //Si no hay ningun error y se ha enviado un valor mantenerlo
                                echo $resultado = ($aErrores['descUsuario']==NULL && isset($_REQUEST['descUsuario'])) ? $_REQUEST['descUsuario'] : ""; 
                              ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="datoR"><label for="LbPassword">Contraseña  <span class="ast">*</span></label></td>
                    </tr>
                    <tr>
                        <td class="datoUsu"><input type="password" name="password" id="LbPassword"></td>
                        <td class="errorR"><?php
                                if ($aErrores['password']!=NULL) { //si hay errores muestra el mensaje
                                    echo "<span style=\"color:red;\">".$aErrores['password']."</span>"; //aparece el mensaje de error que tiene el array aErrores
                                }
                            ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="datoR"><label for="LbPasswordRep">Repetir Contraseña  <span class="ast">*</span></label></td>
                    </tr>
                    <tr>
                        <td class="datoUsu"><input type="password" name="passwordRep" id="LbPasswordRep"></td>
                        <td class="errorR"><?php
                                if ($aErrores['passwordRep']!=NULL) { //si hay errores muestra el mensaje
                                    echo "<span style=\"color:red;\">".$aErrores['passwordRep']."</span>"; //aparece el mensaje de error que tiene el array aErrores
                                }
                            ?></td>
                    </tr>
                    
                    <tr><td class="vacio"></td></tr>
                    
                    <tr>
                        <th><input id="aceptar" name="aceptar" type="submit" value="Aceptar"></th>
                        <th><input id="cancelar" name="cancelar" type="submit" value="Cancelar"></th>
                    </tr>
                </table>
            </form>

        </div>
    </section>
