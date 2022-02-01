
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
                <table class="tRegistro">
                    <tr>
                        <th colspan="2"><h3>REGISTRO</h3></th>
                    </tr>
                    <tr>
                        <td colspan="2" class="datoR"><label for="LbUsuario">Usuario <span class="ast">*</span></label></td>
                        
                    </tr>
                    <tr>
                        <td class="datoUsu"><input type="text" name="usuario" id="LbUsuario"></td>
                        <td class="errorR">campo vacio</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="datoR"><label for="LbDescUsuario">Nombre y Apellidos <span class="ast">*</span></label></td>
                        <tr>
                        <td class="datoUsu"><input type="text" name="descUsuario" id="LbDescUsuario"></td>
                        <td class="errorR">campo vacio</td>
                    </tr>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="dato"><label for="LbPassword">Contraseña  <span class="ast">*</span></label></div>
                            <div class="datoUsu"><input type="password" name="password" id="LbPassword"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="dato"><label for="LbPasswordRep">Repetir Contraseña  <span class="ast">*</span></label></div>
                            <div class="datoUsu"><input type="password" name="passwordRep" id="LbPasswordRep"></div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <div class="error"><?php
                                if ($aErrores['usuario']!=NULL || $aErrores['password']!=NULL) { //si hay errores muestra el mensaje
                                    echo "<span style=\"color:red;\">usuario y/o contraseña incorrecto</span>"; //aparece el mensaje de error que tiene el array aErrores
                                }
                            ?></div>
                        </td>
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
