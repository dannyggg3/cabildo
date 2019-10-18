
<?php
    require_once "../modelos/Deudas.php";

    
$deudas=new Deudas();



switch ($_GET["op"]){

    case 'emi03':

    $resp=$deudas->EMI();
    $data= Array();
    while (($row = oci_fetch_assoc($stid)) != false) {
        $data[]=array(
             "0"=>$row['EMI03CODI'],
             "1"=>$row['EMI03DES'],
             "2"=>$row['EMI03NOTA'],
             "3"=>$row['EMI03TIPO']
                     );
            $results = array(
            "sEcho"=>1, 
            "iTotalRecords"=>count($data), 
            "iTotalDisplayRecords"=>count($data), 
            "aaData"=>$data);
        echo json_encode($results);
    }

    break;
    
  
    case 'mostrarcliente':
     $rspta=$cliente->select();
     echo '<option value="" > -- SELECCIONE --- </option>';
     while ($reg = $rspta->fetch_object())
             {
               echo '<option value="'.$reg->idcliente.'">'.$reg->nombre_cliente.' | '.$reg->cedula_cliente.'</option>';

             }
     break;
     
     case 'validarcedula':

     if ($cedula_cliente=="2222222222" || $cedula_cliente=="0000000000"){
      echo 'Cédula incorrecta: El número ingresado pertenece al algoritmo verificador pero no es válido';
     }else{
          //Cargar el autoload de composer
          require '../vendor/autoload.php';
          // Crear nuevo objeto
          $validador = new Tavo\ValidadorEc;
            if ($validador->validarCedula($cedula_cliente)) {
            echo 'si';
          } else {
            echo 'Cédula incorrecta: '.$validador->getError();
          }
     }

     
    
 break;

}
    
?>
    