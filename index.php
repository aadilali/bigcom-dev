<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding, X-Auth-Token");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.bigcommerce.com/stores/cxahscodbs/v2/orders/" . $_GET['oid'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/json",
    "X-Auth-Token: cfxi39as2eounkznn21w3q3z1nkfwgr"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);


if ($err) {
  echo json_encode( array("status" => "failed", "res" => "cURL Error #:" . $err) );
} else {
   //echo json_encode( array("status" => "success", "res" => $response) );
print_r($json_decode($response));
   curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.bigcommerce.com/stores/cxahscodbs/v2/customers/".$response->customer_id,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
      "Accept: application/json",
      "Content-Type: application/json",
      "X-Auth-Token: cfxi39as2eounkznn21w3q3z1nkfwgr"
    ],
  ]);

  $response = curl_exec($curl);
  $err = curl_error($curl);


  if ($err) {
    echo json_encode( array("status" => "failed", "res" => "cURL Error #:" . $err) );
  } else {
     echo json_encode( array("status" => "success", "res" => $response) );
  }
}

curl_close($curl);


