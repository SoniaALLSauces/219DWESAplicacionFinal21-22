
<!--  Author: Sonia Antón Llanes
  --  Created on: 25-enero-2022
  --  Last Modify: 25-enero-2022
  --  vREST PROYECTO LOGIN LOGOUT: $vistaEnCurso tiene como valor rest : mostramos el formulario y resultado
  -->


    <section class="login">
        
        <div class="volver">
            <form name="volver" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input id="volver" name="volver" type="submit" value="">
            </form>
        </div>

        <h2 class="ventana">API REST Externo: TEMPERATURA</h2>
        
        <div class="rest">
            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table class="tRest">
                    <tr>
                        <td colspan="2">
                            <div class="dato"><label for="LbCiudad">CIUDAD <span class="ast">*</span></label></div>
                            <div class="datoUsu"><input type="text" name="ciudad" id="LbCiudad"></div>
                        </td>
                    </tr>
                                        
                    <tr>
                        <td colspan="2">
                            <div class="error"><?php
                                if ($aErrores['ciudad']!=NULL) { //si hay errores muestra el mensaje
                                    echo "<span style=\"color:red;\">".$aErrores['ciudad']."</span>"; //aparece el mensaje de error que tiene el array aErrores
                                }
                            ?></div>
                        </td>
                    </tr>
                    <tr><td class="vacio"></td></tr>
                    
                    <tr>
                        <th><input id="buscar" name="buscar" type="submit" value="Buscar"></th>
                    </tr>
                </table>
            </form>
            
            <div class="temp">_º</div>
        </div>
    </section>
