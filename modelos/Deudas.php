
<?php
    require "../config/Conexion.php";
    
    Class Deudas
    {
      public function _construct(){
    
      }
    
      public function EMI(){
        $sql="SELECT * FROM EMI3 WHERE EMI03CODI IN (130,131,140)";
        return ejecutarConsulta($sql);
      }


        
    }
?>