
<?php
    require_once "../modelos/Deudas.php";

    
$deudas=new Deudas();



switch ($_GET["op"]){

    case 'emi03':

    $resp=$deudas->EMI();
    $data= Array();

    
    while ($row =oci_fetch_assoc ($resp)){
          
     
      $data[]=array(
        '0'=>$row['EMI03CODI'],
        '1'=>$row['EMI03DES'],
        '2'=>$row['EMI03NOTA'],
        '3'=>$row['EMI03TIPO']
      );
            }

            $results = array(
            "sEcho"=>1, 
            "iTotalRecords"=>count($data), 
            "iTotalDisplayRecords"=>count($data), 
            "aaData"=>$data);
        echo json_encode($results);
    

    break;
    
  
    case 'mostrarcliente':
     $rspta=$cliente->select();
     echo '<option value="" > -- SELECCIONE --- </option>';
     while ($reg = $rspta->fetch_object())
             {
               echo '<option value="'.$reg->idcliente.'">'.$reg->nombre_cliente.' | '.$reg->cedula_cliente.'</option>';

             }
     break;

     case 'buscar':

     $texto=$_GET['text'];

     $resp=$deudas->buscar($texto);
     $data= Array();
 
     
     while ($row =oci_fetch_assoc ($resp)){
      
     
      $str = str_replace(',','.',$row['EMISION']);
      
       $data[]=array(
         '0'=>'<a class="btn-circle btn btn-orange text-white" onclick="pagar('.$row['NROEMISION'].','.$str.')">PL</a> <a class="btn-circle btn btn-cyan text-white popover-item" onclick="detalles('.$row['NROEMISION'].')">DE</a>',
         '1'=>$row['NROEMISION'],
         '2'=>$row['CIU'],
         '3'=>$row['CEDULA_RUC'],
         '4'=>$row['NOMBRES'],
         '5'=>$row['EMISION'],
         '6'=>$row['VAL_ABONOS'],
         '7'=>$row['INTERES'],
         '8'=>$row['COACTIVA'],
         '9'=>$row['FEMI'],
         '10'=>$row['IMPUESTO']
       );
             }
 
             $results = array(
             "sEcho"=>1, 
             "iTotalRecords"=>count($data), 
             "iTotalDisplayRecords"=>count($data), 
             "aaData"=>$data);
         echo json_encode($results);

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


    case 'mostrarDetalles':

    $num_emision=$_POST['num_emision'];
		$rspta=$deudas->detallesDeuda($num_emision);
 		echo json_encode($rspta);
    break;



    case 'realizarPago':

    $id=$_POST['id'];
    $total=$_POST['totalCarr'];

    $numCard=$_POST['numCard'];
    $Expiry=$_POST['Expiry'];
    $CVC=$_POST['CVC'];
    $nameCard=$_POST['nameCard'];

    // print_r($Expiry);
    // die();
    $valore=explode("/",$Expiry);



    $bandera=true;

$curl = curl_init();

$data = array(
        
    "card"=>array (
        "name"=> "TESTING",
        "number"=> $numCard,
        "expiryMonth"=> $valore[0],
        "expiryYear"=> $valore[1],
        "cvv"=> $CVC
    ),
      "totalAmount"=> number_format($total, 2, '.', ' '),
      "currency"=> "USD"
  
);



$payload = json_encode( $data,TRUE);


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-uat.kushkipagos.com/card/v1/tokens",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 300000,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"card\":{\"name\":\"TESTING\",\"number\":\"4386261181077714\",\"expiryMonth\":\"08\",\"expiryYear\":\"23\",\"cvv\":\"121\"},\"totalAmount\":30.15,\"currency\":\"USD\"}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Public-Merchant-Id: 6000000000157167768216299637443"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo $err;
} else {

    $response=json_decode($response);
    //echo $response->token;

    //RECOGIDA DEL TOKEN Y ENVIAR A PAGAR

    $curl = curl_init();

    $data = array(
        
            "token"=> $response->token,
            "amount"=>array(
              "subtotalIva"=> 0,
              "subtotalIva0"=> 30.15,
              "ice"=> 0,
              "iva"=> 0,
              "currency"=> "USD"
            ),
            "deferred"=> array(
              "graceMonths"=> "00",
              "creditType"=> "01",
              "months"=> 0
            ),
            "metadata"=>array (
              "contractID"=> $id
            ),
            "fullResponse"=> TRUE
          
    );

    $payload = json_encode( $data,TRUE);

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-uat.kushkipagos.com/card/v1/charges",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30000,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $payload,
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Private-Merchant-Id: 6000000000157167768216227340630"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

    break;

}

}
    
?>
    