
<!--  Author: Sonia Antón Llanes
  --  Created on: 07-marzo-2022
  --  Last Modify: 07-marzo-2022
  --  vMiCuenta PROYECTO LOGIN LOGOUT: $_SESSION['pagina'] tiene como valor miCuenta : mostramos el formulario para editar Perfil
  -->


    <section class="editar">
        
        

        <div class="divEditar" onmouseout="none()">
            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table class="tFormularioEdit">
                    <tr>
                        <th colspan="3"><h3>Editar Departamento</h3></th>
                    </tr>
                    <tr>
                        <td>
                            <div class="datoE"><label for="LbCodigo">Codigo Departamento </label></div>
                        </td>
                        <td colspan="2">
                            <div class="datoUsu"><input type="text" name="codUsuario" id="LbCodigo" style="background: #f0c0ba;"
                                placeholder="<?php echo $codigo; ?>" disabled></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="datoE"><label for="LbDescripcion">Descripción Departamento </label></div>
                        </td>
                        <td colspan="2">
                            <div class="datoUsu"><input type="text" name="descripcion" id="LbDescripcion"
                                value="<?php echo $descripcion; ?>" style="background: white;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="error"><?php
                                if ($aErrores['descripcion'] != NULL) { //si hay errores muestra el mensaje
                                    echo "<span style=\"color:red;\">Campo obligatorio. Solo admite letras, máximo 50 caracteres</span>"; //aparece el mensaje de error que tiene el array aErrores
                                }
                             ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="datoE"><label for="LbFechaAlta">Fecha de Alta/Rehabilitación </label></div>
                        </td>
                        <td colspan="2">
                            <div class="datoUsu"><input type="text" name="fechaAlta" id="LbFechaAlta" style="background: #f0c0ba;"
                                placeholder="<?php echo $fechaAlta; ?>" disabled></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="datoE"><label for="LbFechaBaja">Fecha de Baja </label></div>
                        </td>
                        <td colspan="2">
                            <div class="datoUsu"><input type="text" name="fechaBaja" id="LbFechaBaja" style="background: #f0c0ba;"
                                placeholder="<?php echo $fechaBaja; ?>" disabled></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="datoE"><label for="LbVolumen">Volumen de Negocio </label></div>
                        </td>
                        <td  colspan="2">
                            <div class="datoUsu"><input type="text" name="volumen" id="LbVolumen" style="background: #f0c0ba;"
                                value="<?php echo $volumen; ?>" style="background: white;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="error"><?php
                                if ($aErrores['descripcion'] != NULL) { //si hay errores muestra el mensaje
                                    echo "<span style=\"color:red;\">Campo obligatorio. Solo admite letras, máximo 50 caracteres</span>"; //aparece el mensaje de error que tiene el array aErrores
                                }
                             ?></div>
                        </td>
                    </tr>

                    <tr>
                        <th><input id="aceptar" name="aceptar" type="submit" value="Guardar Cambios"></th>
                        <th><input id="cancelar" name="cancelar" type="submit" value="Cancelar"></th>
                    </tr>
                </table>
            </form>
        </div>
        
    </section>
