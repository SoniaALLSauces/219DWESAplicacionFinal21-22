
<!--  Author: Sonia Antón Llanes
  --  Created on: 02-febrero-2022
  --  Last Modify: 04-febrero-2022
  --  vMtoDepartamentos PROYECTO FINAL: $_SESSION['pagina'] tiene como valor mtoDepartamentos : mostramos el formulario
  -->


    <section class="mtoUsuarios">
        
        <div class="volver">
            <form name="volver" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input id="volver" name="volver" type="submit" value="">
            </form>
        </div>

        <div class="div">
            <h2>Mantenimiento de Usuarios</h2>
            
            <form name="formularioUsuarios" method="post">
                <div class="FormMtoDptos">
                    <table>
                        <tr class="trDto">
                            <td class="datoDto">
                                <label for="LbDescUsuario">Busco Usuario por descripción </label>
                            </td>
                            <td colspan="2" class="tdDescDto">
                                <input type="text" name="descUsuario" id="LbDescUsuario">
                            </td>
                            <td class="buscarUsuario"><input id="buscarUsuario" name="buscarUsuario" type="submit" value=""></td>
                        </tr>
                    </table>
                </div>
            </form>
            
            <div class="tableUsuarios">
                <table id="tableUsuarios">
                    <tr>
                        <th colspan="4"><h3 class="h3Dep">Usuarios: </h3></th>
                    </tr>
                    <tr class="tr">
                        <th class="datosDep">Usuario</th>
                        <th class="datosDep">Descripcion</th>
                        <th class="datosDep">Ultima Conexion</th>
                        <th class="datosDep">Numero Conex.</th>
                        <th class="datosDep">Perfil</th>
                        <th class="datosDep">Imagen</th>
                        <th></th>
                    </tr>
               
                </table>
            </div>
            
            <script>
                var tabla=document.getElementById("tableUsuarios");  //selecciono la tabla
                var descripcion=document.getElementById("LbDescUsuario");  //selecciono el valor de la descripcion introducida por el usuario
                console.log(descripcion.value);
                
                
                document.getElementById("buscarUsuario").addEventListener("click", buscarUsuarios('') );
                function buscarUsuarios(descUsuario){
                    
                    var xhr = new XMLHttpRequest();
                        //inicio el objeto XMLHttpRequest() llamando a la api de Usuarios creada
                    xhr.open('get', `http://daw219.sauces.local/219DWESAplicacionFinal21-22/api/consultaUsuarioPorDescripcion.php?descUsuario=${descUsuario}`, true); 
                        xhr.onload = function(){
                            //console.log(this.responseText);
                            var aUsers = JSON.parse(this.responseText); 
                            for (let i=0; i<aUsers.length; i++){
                                var fila=document.createElement("tr");
                                    var celdaCodigo=document.createElement("td");
                                        celdaCodigo.innerHTML= aUsers[i].codigo;
                                        fila.appendChild(celdaCodigo);
                                    var celdaDescripcion=document.createElement("td");
                                        celdaDescripcion.innerHTML= aUsers[i].descripcion;
                                        fila.appendChild(celdaDescripcion);
                                    var celdaUltConexion=document.createElement("td");
                                        var timestampUltConexion= aUsers[i].ultimaConexion;
                                        var date = new Date(timestampUltConexion);
                                        var ultimaConexion = date.getDate() +"/"+ (date.getMonth()+1) +"/"+ date.getFullYear();  //formateo la fecha en dia/mes/año
                                        celdaUltConexion.innerHTML= aUsers[i].ultimaConexion;
                                        fila.appendChild(celdaUltConexion);
                                    var celdaNConexiones=document.createElement("td");
                                        celdaNConexiones.innerHTML= aUsers[i].numConexiones;
                                        fila.appendChild(celdaNConexiones);
                                    var celdaPerfil=document.createElement("td");
                                        celdaPerfil.innerHTML= aUsers[i].perfil;
                                        fila.appendChild(celdaPerfil);

                                tabla.appendChild(fila);
                            }
                        }
                    xhr.send();  //envio la peticion
                }
            </script>

        </div>
    </section>
