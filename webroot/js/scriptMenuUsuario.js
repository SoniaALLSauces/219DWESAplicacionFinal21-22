
/**
     * Script para visualizar y ocultar el menu del Usuario
     * 
     * @author Sonia Anton Llanes
     * @created 01/02/2022
     * @updated: 01/02/2022
     */


        function none(){
            for (let i=0;i<3;i++){
                document.getElementsByClassName("liUsuario")[i].style.display="none";
            }
        }
        
        function block(){
            for (let i=0;i<3;i++){
                document.getElementsByClassName("liUsuario")[i].style.display="block";
            }
        }



