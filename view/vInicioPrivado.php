
<!--  Author: Sonia Antón Llanes
  --  Created on: 10-enero-2022
  --  Last Modify: 01-febrero-2022
  --  vInicioPrivado PROYECTO LOGIN LOGOUT: el valor de $_SESSION['pagina'] muestra ventana Privada cuando el usuario se ha logeado correctamente
  -->


    
  
    <section class="inicioPr">
        
        <ul id="listaUsuario" >
            <form name="bottonUsu" method="post">
                <li class="imagenUsuario"><img onclick="block()" src="webroot/images/usuario.png" alt="IconoUsuario"></li>
                <li class="liUsuario"><input type="submit" id="editarPerfil" value="Editar Perfil" name="editarPerfil"></li>
                <li class="liUsuario"><input type="submit" id="detalle" value="Detalle" name="detalle"></li>
                <li class="liUsuario"><input type="submit" id="cerrarSesion" value="Cerrar sesión" name="cerrarSesion"></li>
            </form>
        </ul>
        
        <div class="funcionalidadUsuario" onclick="none()">
            <form class="botonesHeader" name="inicio" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Mto Departamentos" name="botonDepartamentos">
                <input type="submit" value="API REST" name="rest">
            </form>

    <!--        <table class="tablaBottonUsu">
                <tr>
                    <form name="bottonUsu" method="post">
                        <td class="botonesPr"><input type="submit" id="editarPerfil" value="Editar Perfil" name="editarPerfil"></td>
                        <td class="botonesPr"><input type="submit" id="detalle" value="Detalle" name="detalle"></td>
                        <td class="botonesPr"><input type="submit" id="cerrarSesion" value="Cerrar sesión" name="cerrarSesion"></td>
                        <td class="botonesPr"><img src="webroot/images/usuario.png" alt="IconoUsuario"></td>
                    </form>
                </tr>
            </table>-->

            <section class="datosUsuario">            
                <article  class="saludo">
                    <p>BIENVENID@   <?php echo $descripcion ?></p>

                    <?php
                        if ($conexiones==1){
                            echo "<p>Esta es la PRIMERA vez que se conecta.</p>";
                        } else{
                            echo "<p>Es la ".$conexiones."ª vez que se conecta.</p>";
                                $ultimaConexion = new DateTime();
                                $ultimaConexionFormat = $ultimaConexion-> setTimestamp($conexionAnterior) -> format ('d-m-Y H:i:s');
                            echo "<p>Se conectó por ultima vez el: $ultimaConexionFormat </p>";
                        }
                    ?>

                </article> 
            </section>
        </div>
        
    </section>