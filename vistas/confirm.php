<?php

$bandera=true;

$curl = curl_init();

$data = array(
        
    "card"=>array (
        "name"=> "TESTING",
        "number"=> "5451951574925480",
        "expiryMonth"=> "12",
        "expiryYear"=> "23",
        "cvv"=> "123"
    ),
      "totalAmount"=> 30.15,
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
              "contractID"=> "157AB"
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
    
}

?>