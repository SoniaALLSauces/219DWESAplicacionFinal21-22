
<!--  Author: Sonia Antón Llanes
  --  Created on: 27-enero-2022
  --  Last Modify: 27-enero-2022
  --  vWIP PROYECTO LOGIN LOGOUT: el valor de $_SESSION['pagina'] muestra ventana Work In Progress 
  --     muestra una imagen cuando aun esta pendiente de realizar esta parte del programa
  -->


    <section class="inicio">

        <div class="volver">
            <form name="volver" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input id="volver" name="volver" type="submit" value="">
            </form>
        </div>

        <section class="wip">
            <img src="webroot/images/WIP.jfif" alt="Work In Progress">
        </section>
        
    </section>