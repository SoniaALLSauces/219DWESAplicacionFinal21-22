
<!--  Author: Sonia Antón Llanes
  --  Created on: 26-enero-2022
  --  Last Modify: 26-enero-2022
  --  vDetalle PROYECTO LOGIN LOGOUT: el valor de $_SESSION['pagina'] muestra ventana Detalle 
  --     con los datos $_SESSION, $_COOKIE, $_SERVER y phpInfo()
  -->


  <section class="detalle">
        
        <div class="volver">
            <form name="volver" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input id="volver" name="volver" type="submit" value="">
            </form>
        </div>
      
        <div>
            <!-- $_SESSION -->
                <table class="tableVariable">
                    <tr>
                        <td class="nombreVariable"><h4>Variable $_SESSION</h4></td>
                    </tr>
                </table>
                <table class="tableVariable">
                    <?php
                        foreach ($_SESSION as $elemento => $valor) {
                            echo "<tr>";
                            echo "<td class=\"td\">$elemento</td> <td class=\"td\">";
                                print_r($valor);
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>

                    <!-- $_SERVER -->
                <table class="tableVariable">
                    <tr>
                        <td class="nombreVariable"><h4>Variable $_SERVER</h4></td>
                    </tr>
                </table>
                <table class="tableVariable">
                    <?php
                        foreach ($_SERVER as $elemento => $valor) {
                            echo "<tr>";
                            print_r("<td class=\"td\">$elemento</td> <td class=\"td\">$valor</td>");
                            echo "</tr>";
                        }
                echo "</table>";        
                    ?>

                <table class="tableVariable">
                    <tr>
                        <td class="nombreVariable"><h4>PHPINFO()</h4></td>
                    </tr>
                </table>
                    <?php
                    /* Mostramos phpinfo() */            
                        phpinfo();

                    ?>
            </div>
  </section>