
<!--  Author: Sonia Antón Llanes
  --  Created on: 02-febrero-2022
  --  Last Modify: 02-febrero-2022
  --  vMtoDepartamentos PROYECTO FINAL: $_SESSION['pagina'] tiene como valor mtoDepartamentos : mostramos el formulario
  -->


    <section class="login">
        
        <div class="volver">
            <form name="volver" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input id="volver" name="volver" type="submit" value="">
            </form>
        </div>

        <div class="div">
            <h3>Mantenimiento de Departamentos</h3>
            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table class="tFormulario">
                    <tr>
                        <td colspan="2">
                            <div class="dato"><label for="LbUsuario">Usuario <span class="ast">*</span></label></div>
                            <div class="datoUsu"><input type="text" name="usuario" id="LbUsuario"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="dato"><label for="LbPassword">Contraseña  <span class="ast">*</span></label></div>
                            <div class="datoUsu"><input type="password" name="password" id="LbPassword"></div>
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
                        <th><input id="login" name="login" type="submit" value="Iniciar Sesion"></th>
                        <th><input id="register" name="register" type="submit" value="Registrarse"></th>
                    </tr>
                </table>
            </form>

        </div>
    </section>
