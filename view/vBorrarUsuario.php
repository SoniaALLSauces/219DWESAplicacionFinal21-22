
<!--  Author: Sonia Antón Llanes
  --  Created on: 01-febrero-2022
  --  Last Modify: 01-febrero-2022
  --  vMiCuenta PROYECTO LOGIN LOGOUT: $_SESSION['pagina'] tiene como valor miCuenta : mostramos el formulario para editar Perfil
  -->


    <section class="editar">
        
        <ul id="listaUsuario" >
            <form name="bottonUsu" method="post">
                <li class="imagenUsuario"><img onclick="block()" src="webroot/images/usuario.png" alt="IconoUsuario"></li>
                <li class="liUsuario"><input type="submit" id="editarImagen" value="Editar Imagen" name="editarImagen"></li>
                <li class="liUsuario"><input type="submit" id="borrar" value="Borrar Usuario" name="borrar"></li>
            </form>
        </ul>

        <div class="divEditar" onclick="none()">
            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table class="tFormularioEdit">
                    <tr>
                        <th colspan="3"><h3>Borrar Usuario</h3></th>
                    </tr>
                    <tr>
                        <th colspan="3"><img src=""></th>
                    </tr>
                    <tr>
                        <td>
                            <div class="datoE"><label for="LbUsuario">Usuario </label></div>
                        </td>
                        <td colspan="2">
                            <div class="datoUsu"><input type="text" name="usuario" id="LbUsuario" style="background: #f0c0ba;"
                                placeholder="<?php echo $usuario; ?>" disabled></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="datoE"><label for="LbDescripcion">Nombre y Apellidos <span class="ast">*</span></label></div>
                        </td>
                        <td colspan="2">
                            <div class="datoUsu"><input type="text" name="descripcion" id="LbDescripcion"
                                placeholder="<?php echo $descripcion; ?>" disabled></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="datoE"><label for="LbNumConexiones">Nº de Conexiones </label></div>
                        </td>
                        <td colspan="2">
                            <div class="datoUsu"><input type="text" name="numConexiones" id="LbNumConexiones" style="background: #f0c0ba;"
                                placeholder="<?php echo $conexiones; ?>" disabled></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="datoE"><label for="LbUltConexion">Fecha Ultima Conexión </label></div>
                        </td>
                        <td colspan="2">
                            <div class="datoUsu"><input type="text" name="ultConexion" id="LbUltConexion" style="background: #f0c0ba;"
                                placeholder="<?php echo $ultimaConexionFormat; ?>" disabled></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="datoE"><label for="LbPerfil">Perfil </label></div>
                        </td>
                        <td  colspan="2">
                            <div class="datoUsu"><input type="text" name="perfil" id="LbPerfil" style="background: #f0c0ba;"
                                placeholder="<?php echo $perfil; ?>" disabled=></div>
                        </td>
                    </tr>

                    <tr><td class="vacio"></td></tr>
                    <tr>
                        <th><input id="borrar" name="borrar" type="submit" value="Borrar"></th>
                        <th><input id="cancelar" name="cancelar" type="submit" value="Cancelar"></th>
                    </tr>
                </table>
            </form>
        </div>
        
    </section>
