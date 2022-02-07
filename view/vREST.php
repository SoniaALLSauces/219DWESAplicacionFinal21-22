
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
        <h3 class="webApi"><a href="https://weatherstack.com/documentation" target="_blank">WEATHERSTACK - https://weatherstack.com/documentation</a></h3>
        
        <div class="rest">
            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table class="tRest">
                    <tr>
                        <td colspan="2">
                            <div class="datoRest"><label for="LbCiudad">CIUDAD <span class="ast">*</span></label></div>
                            <div class="datoUsu"><input type="text" name="ciudad" id="LbCiudad"
                                value="<?php  //Si no hay ningun error y se ha enviado un valor mantenerlo
                                    echo $resultado = isset($_SESSION['oCiudad']) ? $ciudad : ""; 
                                    ?>"></div>
                        </td>
                        <th><input id="buscar" name="buscarCd" type="submit" value=""></th>
                    </tr>
                                        
                    <tr>
                        <td colspan="3">
                            <div class="error"><?php
                                if ($aErrores['ciudad']!=NULL) { //si hay errores muestra el mensaje
                                    echo "<span style=\"color:red;\">".$aErrores['ciudad']."</span>"; //aparece el mensaje de error que tiene el array aErrores
                                }
                            ?></div>
                        </td>
                    </tr>
                </table>
            </form>
            
            <?php if (isset($_SESSION['oCiudad'])){ ?>
                <article class="temp">
                    <div class="tempImg">
                        <img src="<?php echo $icono; ?>" alt="Icono">
                    </div>
                    <div class="grados">
                        <div> <?php echo $temperatura; ?>º </div>
                        <p class="destacar"> <?php echo $ciudad; ?> </p>
                        <p class="p"> <?php echo $region."/".$pais; ?> </p>
                    </div>
                </article>
            <?php } else{ ?>
                <article class="sinTemp">
                    <div class="descAPI">API REST que devuelve la temperatura en tiempo real de cualquier lugar del mundo 
                                        Requiere subscripción que permite un máximo de 250 consultas al mes con coste 0. 
                                        Datos que devuelve en Json son, entre otros: pais, region, latitud/longitud, zona horaria, fecha/hora, temperatura actual, presión, humedad, icono...... </div>
                </article>
            <?php } ?>
        </div>
        
        <h2 class="ventana">API REST Externo de Aroa: El Tiempo</h2>
        <h3 class="webApi"><a href="https://www.el-tiempo.net/api" target="_blank">EL-TIEMPO.NET - https://www.el-tiempo.net/api</a></h3>
        
        
        <div class="rest">
            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table class="tRest">
                    <tr>
                        <td colspan="2">
                            <div class="datoRest"><label for="LbProvincia">Código Provincia <span class="ast">*</span></label></div>
                            <div class="datoUsu"><input type="text" name="provincia" id="LbProvincia" placeholder="cp provincia: 01, 02, 03..., 52 "
                                value="<?php  //Si no hay ningun error y se ha enviado un valor mantenerlo
                                    echo $resultado = isset($_SESSION['oProvincia']) ? $idProvincia : ""; 
                                    ?>"></div>
                        </td>
                        <th><input id="buscar" name="buscarPr" type="submit" value=""></th>
                    </tr>
                                        
                    <tr>
                        <td colspan="3">
                            <div class="error"><?php
                                if ($aErrores['provincia']!=NULL) { //si hay errores muestra el mensaje
                                    echo "<span style=\"color:red;\">".$aErrores['provincia']."</span>"; //aparece el mensaje de error que tiene el array aErrores
                                }
                            ?></div>
                        </td>
                    </tr>
                </table>
            </form>
            
            <article class="tiempo">
                <?php if (isset($_SESSION['oProvincia'])){ ?>
                    <p><span class="destacar"><?php echo $provincia; ?>:</span>
                        <?php echo $tiempo; ?> </p>
                <?php } else{ ?>
                    <div class="descAPI">API REST que devuelve la temperatura y el tiempo según los dos primeros dígitos del código postal de la provincia. 
                                        Los datos que devuelve, entre otros, son: breve resumen del tiempo en el día de hoy o mañana, temperatura máxima y mínima...</div>
                <?php } ?>
            </article>
        </div>
        
        <div class="vacio"></div>
        
    </section>
