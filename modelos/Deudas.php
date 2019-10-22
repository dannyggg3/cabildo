
<?php
    require "../config/Conexion.php";
    
    Class Deudas
    {
      public function _construct(){
    
      }
    
      public function EMI(){
        $sql="SELECT * FROM EMI03 WHERE EMI03CODI IN (130,131,140)";
        return ejecutarConsulta($sql);
      }

      public function buscar($texto){
        $sql="SELECT * FROM WEB_DEUDAS WHERE IMP IN (130,131,140) AND ESTADO='PENDIENTES' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      public function detallesDeuda($NROEMISION){
        $sql="SELECT * FROM WEB_DEUDAS WHERE NROEMISION='$NROEMISION'";
        return ejecutarConsultaSimpleFila($sql);
      }


        
    }
?>