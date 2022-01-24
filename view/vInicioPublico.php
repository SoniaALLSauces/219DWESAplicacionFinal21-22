
<!--  Author: Sonia Antón Llanes
  --  Created on: 10-enero-2022
  --  Last Modify: 10-enero-2022
  --  vInicio PROYECTO LOGIN LOGOUT: cuando el valor de $vistaEnCurso  se muestra ventana Bienvenido
  -->


    <section class="inicio">

        <form class="logBoton botones" name="inicio" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="submit" value="Log IN" name="log">
        </form>

        <section class="miWeb">
            <article class="bienvenidos"> 
                <p>Bienvenidos</p>
                <p>a MI WEB</p>
            </article>
        </section>
        
        <section>
            <article>
                <p>Catálogo de Requisitos</p>
                <img src="" alt="catalogoRequisitos">
            </article>
            <article>
                <img src="" alt="diagramaCasosDeUso">
                <p>Diagrama de Casos de Uso</p>
            </article>
            <article>
                <p>Diagrama de Clases</p>
                <img src="" alt="diagramaClases">
            </article>
            <article>
                <img src="" alt="arbolNavegación">
                <p>Arbol de navegación</p>
            </article>
            <article>
                <p>Mapa Web - Relación de ficheros</p>
                <img src="" alt="mapaWebFicheros">
            </article>
            <article>
                <img src="" alt="estructuraAlmacenamiento">
                <p>Estructura de Almacenamiento</p>
            </article>
            <article>
                <p>Modelo Físico de Datos</p>
                <img src="" alt="modFisicodeDatos">
            </article>
        </section>
        
    </section>