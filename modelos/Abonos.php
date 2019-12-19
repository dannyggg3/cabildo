
<?php
    require "../config/Conexion.php";
    
    Class Abonos
    {
      public function _construct(){
    
      }
    
      public function EMI(){
        $sql="SELECT * FROM EMI03 WHERE EMI03CODI IN (130,131,140)";
        return ejecutarConsulta($sql);
      }

      public function buscar($texto){
        $sql="SELECT * FROM WEB_DEUDAS WHERE IMP IN (130,131,140) AND ESTADO='ABONOS' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      public function totalesBuscar($texto){
        $sql="SELECT sum(EMISION) AS EMISION,sum(VAL_ABONOS) AS VAL_ABONOS,sum(INTERES) AS INTERES FROM WEB_DEUDAS WHERE IMP IN (130,131,140) AND ESTADO='ABONOS' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

    
 

      public function buscar_predios_urbanos($texto){
        $sql="SELECT * FROM WEB_DEUDAS WHERE IMP IN (140) AND ESTADO='ABONOS' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      public function totalesPediosUrbanos($texto){
        $sql="SELECT sum(EMISION) AS EMISION,sum(VAL_ABONOS) AS VAL_ABONOS,sum(INTERES) AS INTERES FROM WEB_DEUDAS WHERE IMP IN (140) AND ESTADO='ABONOS' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      public function buscar_agua_potable($texto){
        $sql="SELECT * FROM WEB_DEUDAS WHERE IMP IN (131) AND ESTADO='ABONOS' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      public function totalesagua_potable($texto){
        $sql="SELECT sum(EMISION) AS EMISION,sum(VAL_ABONOS) AS VAL_ABONOS,sum(INTERES) AS INTERES FROM WEB_DEUDAS WHERE IMP IN (131) AND ESTADO='ABONOS' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      public function buscar_patente_municipal($texto){
        $sql="SELECT * FROM WEB_DEUDAS WHERE IMP IN (130) AND ESTADO='ABONOS' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      public function totalespatente_municipal($texto){
        $sql="SELECT sum(EMISION) AS EMISION,sum(VAL_ABONOS) AS VAL_ABONOS,sum(INTERES) AS INTERES FROM WEB_DEUDAS WHERE IMP IN (130) AND ESTADO='ABONOS' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      

      public function detallesDeuda($NROEMISION){
        $sql="SELECT * FROM WEB_DEUDAS WHERE NROEMISION='$NROEMISION'";
        return ejecutarConsultaSimpleFila($sql);
      }
 
    }
?>