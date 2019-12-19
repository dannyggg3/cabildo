
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

      public function count_predios_urbanos(){
        $sql="SELECT COUNT(*) AS PREDIOS_URBANOS FROM WEB_DEUDAS WHERE IMP IN (140) AND ESTADO='ABONOS' ";
        return ejecutarConsulta($sql);
      }

      public function count_agua_potable(){
        $sql="SELECT COUNT(*) AS AGUA_POTABLE FROM WEB_DEUDAS WHERE IMP IN (131) AND ESTADO='ABONOS' ";
        return ejecutarConsulta($sql);
      }

      public function count_patente_municipal(){
        $sql="SELECT COUNT(*) AS PATENTE_MUNICIPAL FROM WEB_DEUDAS WHERE IMP IN (130) AND ESTADO='ABONOS' ";
        return ejecutarConsulta($sql);
      }

      public function count_predios_urbanos_pendi(){
        $sql="SELECT COUNT(*) AS PREDIOS_URBANOS FROM WEB_DEUDAS WHERE IMP IN (140) AND ESTADO='PENDIENTES' ";
        return ejecutarConsulta($sql);
      }

      public function count_agua_potable_pendi(){
        $sql="SELECT COUNT(*) AS AGUA_POTABLE FROM WEB_DEUDAS WHERE IMP IN (131) AND ESTADO='PENDIENTES' ";
        return ejecutarConsulta($sql);
      }

      public function count_patente_municipal_pendi(){
        $sql="SELECT COUNT(*) AS PATENTE_MUNICIPAL FROM WEB_DEUDAS WHERE IMP IN (130) AND ESTADO='PENDIENTES' ";
        return ejecutarConsulta($sql);
      }

      public function buscar($texto){
        $sql="SELECT * FROM WEB_DEUDAS WHERE IMP IN (130,131,140) AND ESTADO='PENDIENTES' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      public function totalesBuscar($texto){
        $sql="SELECT sum(EMISION) AS EMISION,sum(VAL_ABONOS) AS VAL_ABONOS,sum(INTERES) AS INTERES FROM WEB_DEUDAS WHERE IMP IN (130,131,140) AND ESTADO='PENDIENTES' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }


      public function buscar_predios_urbanos($texto){
        $sql="SELECT * FROM WEB_DEUDAS WHERE IMP IN (140) AND ESTADO='PENDIENTES' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      public function totalesPediosUrbanos($texto){
        $sql="SELECT sum(EMISION) AS EMISION,sum(VAL_ABONOS) AS VAL_ABONOS,sum(INTERES) AS INTERES FROM WEB_DEUDAS WHERE IMP IN (140) AND ESTADO='PENDIENTES' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      public function buscar_agua_potable($texto){
        $sql="SELECT * FROM WEB_DEUDAS WHERE IMP IN (131) AND ESTADO='PENDIENTES' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      public function totalesagua_potable($texto){
        $sql="SELECT sum(EMISION) AS EMISION,sum(VAL_ABONOS) AS VAL_ABONOS,sum(INTERES) AS INTERES FROM WEB_DEUDAS WHERE IMP IN (131) AND ESTADO='PENDIENTES' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      public function buscar_patente_municipal($texto){
        $sql="SELECT * FROM WEB_DEUDAS WHERE IMP IN (130) AND ESTADO='PENDIENTES' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      public function totalespatente_municipal($texto){
        $sql="SELECT sum(EMISION) AS EMISION,sum(VAL_ABONOS) AS VAL_ABONOS,sum(INTERES) AS INTERES FROM WEB_DEUDAS WHERE IMP IN (130) AND ESTADO='PENDIENTES' AND (CEDULA_RUC='$texto' OR CIU='$texto' )";
        return ejecutarConsulta($sql);
      }

      

      public function detallesDeuda($NROEMISION){
        $sql="SELECT * FROM WEB_DEUDAS WHERE NROEMISION='$NROEMISION'";
        return ejecutarConsultaSimpleFila($sql);
      }

      


        
    }
?>