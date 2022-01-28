
<!--  Author: Sonia Antón Llanes
  --  Created on: 21-enero-2022
  --  Last Modify: 24-enero-2022
  --  vInicioPublico PROYECTO LOGIN LOGOUT: el valor de $_SESSION['pagina'] muestra ventana Publica
  -->


    <section class="inicioPl">

        <form class="botonesHeader" name="inicio" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="submit" value="Log IN" name="log">
        </form>

        <section class="miWeb">
            <article class="bienvenidos"> 
                <p>Bienvenidos</p>
                <p>a MI WEB</p>
            </article>
        </section>
        
        <section class="secDoc">
            <h3>DESCUBRE   COMO   ESTÁ   CONSTRUIDA   ESTA   WEB</h3>
            <article class="documentosApp">
                <div class="descripcion">
                    <p class="documento">Catálogo de Requisitos</p>
                    <p></p>
                </div>
                <a class="docImagen" target="_blank" href="doc/docsApp/220119CatalogoDeRequisitos.pdf">
                    <img src="webroot/images/docs/catRequisitos.png" alt="catalogoRequisitos">
                </a>
            </article>
            <article class="documentosApp">
                <a class="docImagen" target="_blank" href="doc/docsApp/220119DiagramaDeCasosDeUso.pdf">
                    <img src="webroot/images/docs/diagCasosUso.png" alt="diagramaCasosDeUso">
                </a>
                <div class="descripcion">
                    <p class="documento">Diagrama de Casos de Uso</p>
                    <p>El diagrama de caso de uso es un tipo de diagrama UML de comportamiento 
                        y se usa frecuentemente para analizar varios sistemas. 
                        Permiten visualizar los diferentes tipos de roles en un sistema 
                        y cómo esos roles interactúan con el sistema.</p>
                </div>
            </article>
            <article class="documentosApp">
                <div class="descripcion">
                    <p class="documento">Diagrama de Clases</p>
                    <p>Los diagramas de clases son uno de los tipos de diagramas más útiles en UML, 
                       ya que trazan claramente la estructura de un sistema concreto al modelar 
                       sus clases, atributos, operaciones y relaciones entre objetos.</p>
                </div>
                <a class="docImagen" target="_blank" href="doc/docsApp/220119DiagramaDeClases.pdf">
                    <img src="webroot/images/docs/diagClases.png" alt="diagramaClases">
                </a>
            </article>
            <article class="documentosApp">
                <a class="docImagen" target="_blank" href="doc/docsApp/220119ArbolDeNavegación.pdf">
                    <img src="webroot/images/docs/arbolNavegacion.png" alt="arbolNavegación">
                </a>
                <div class="descripcion">
                    <p class="documento">Arbol de navegación</p>
                    <p>Se trata de la representación gráfica de la estructura de navegación de un sitio web, 
                       con la que podemos ver de forma general y esquemática qué información se ofrecerá al usuario 
                       y cómo va a estar distribuida entre las diferentes secciones.</p>
                </div>
            </article>
            <article class="documentosApp">
                <div class="descripcion">
                    <p class="documento">Mapa Web - Relación de ficheros</p>
                    <p>Un mapa web es una lista de las páginas de un sitio web accesibles por parte de los usuarios. 
                       Puede ser tanto un documento usado como herramienta de planificación para el diseño de una web, 
                       como una página que lista las páginas de una web, organizadas comúnmente de forma jerárquica.</p>
                </div>
                <a class="docImagen" target="_blank" href="doc/docsApp/220119RelacionDeFicheros.pdf">
                    <img src="webroot/images/docs/relacionFicheros.png" alt="mapaWebFicheros">
                </a>
            </article>
            <article class="documentosApp">
                <a class="docImagen" target="_blank" href="doc/docsApp/211129EstandarDesarrolloDAWyEstructuraAlmacenamientoDWES.pdf">
                    <img src="webroot/images/docs/estrAlmacenamiento.png" alt="estructuraAlmacenamiento">
                </a>
                <div class="descripcion">
                    <p class="documento">Estructura de Almacenamiento</p>
                </div>
            </article>
            <article class="documentosApp">
                <div class="descripcion">
                    <p class="documento">Modelo Físico de Datos</p>
                    <p>Un modelo físico de datos es un modelo específico de bases de datos que representa 
                       objetos de datos relacionalfísicoses (por ejemplo, tablas, columnas, claves principales y claves externas) 
                       y sus relaciones.</p>
                </div>
                <a class="docImagen" target="_blank" href="doc/docsApp/201127ModeloFisicoDeDatos20-21.pdf">
                    <img src="webroot/images/docs/modFisicoDatos.png" alt="modFisicodeDatos">
                </a>
                
            </article>
        </section>
        
    </section>