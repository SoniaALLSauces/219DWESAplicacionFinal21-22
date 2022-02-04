
<!--  Author: Sonia Antón Llanes
  --  Created on: 25-enero-2022
  --  Last Modify: 25-enero-2022
  --  vREST PROYECTO LOGIN LOGOUT: $_SESSION['pagina'] tiene como valor rest : mostramos el formulario y resultado
  -->


    <section class="login">
        
        <div class="volver">
            <form name="volver" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input id="volver" name="volver" type="submit" value="">
            </form>
        </div>

        <h2 class="ventana">API REST Externo: TEMPERATURA ACTUAL</h2>
        <h3 class="webApi"><a href="https://weatherstack.com/documentation" target="_blank">WEATHERSTACK - Real-Time & Historical World Weather Data API</a></h3>
        
        <div class="rest">
            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table class="tRest">
                    <tr>
                        <td colspan="2">
                            <div class="dato"><label for="LbCiudad">CIUDAD <span class="ast">*</span></label></div>
                            <div class="datoUsu"><input type="text" name="ciudad" id="LbCiudad"
                                value="<?php  //Si no hay ningun error y se ha enviado un valor mantenerlo
                                    echo $resultado = ($aErroresCd['ciudad']==NULL && isset($_REQUEST['ciudad'])) ? $aRespuestas['ciudad'] : ""; 
                                    ?>"></div>
                        </td>
                        <th><input id="buscar" name="buscarCd" type="submit" value=""></th>
                    </tr>
                                        
                    <tr>
                        <td colspan="3">
                            <div class="error"><?php
                                if ($aErroresCd['ciudad']!=NULL) { //si hay errores muestra el mensaje
                                    echo "<span style=\"color:red;\">".$aErroresCd['ciudad']."</span>"; //aparece el mensaje de error que tiene el array aErrores
                                }
                            ?></div>
                        </td>
                    </tr>
                    <tr><td class="vacio"></td></tr>
                    
                </table>
            </form>
            
            <article class="temp">
                <div> <?php echo $temperatura; ?>º </div>
                <p> <?php echo $region."/".$pais; ?> </p>
            </article>
        </div>
        
        <h2 class="ventana">Otro API REST Externo: El Tiempo</h2>
        <h3 class="webApi"><a href="https://www.el-tiempo.net/api" target="_blank">EL-TIEMPO.NET</a></h3>
        
        
        <div class="rest">
            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table class="tRest">
                    <tr>
                        <td colspan="2">
                            <div class="dato"><label for="LbProvincia">Código Provincia <span class="ast">*</span></label></div>
                            <div class="datoUsu"><input type="text" name="provincia" id="LbProvincia" placeholder="codigo postal provincia: 01, 02, 03..., 52 "
                                value="<?php  //Si no hay ningun error y se ha enviado un valor mantenerlo
                                    echo $resultado = ($aErroresPr['provincia']==NULL && isset($_REQUEST['provincia'])) ? $aRespuestas['provincia'] : ""; 
                                    ?>"></div>
                        </td>
                        <th><input id="buscar" name="buscarPr" type="submit" value=""></th>
                    </tr>
                                        
                    <tr>
                        <td colspan="3">
                            <div class="error"><?php
                                if ($aErroresPr['provincia']!=NULL) { //si hay errores muestra el mensaje
                                    echo "<span style=\"color:red;\">".$aErroresPr['provincia']."</span>"; //aparece el mensaje de error que tiene el array aErrores
                                }
                            ?></div>
                        </td>
                    </tr>
                    <tr><td class="vacio"></td></tr>
                    
                </table>
            </form>
            
            <article class="temp">
                <div> <?php echo $temperatura; ?>º </div>
                <p> <?php echo $region."/".$pais; ?> </p>
            </article>
        </div>
        
    </section>
