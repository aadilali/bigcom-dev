<?php

header("Access-Control-Allow-Origin: *");

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.bigcommerce.com/stores/cxahscodbs/v2/customers/1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/json",
    "X-Auth-Token: cfxi39as2eounkznn21w3q3z1nkfwgr"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  //echo json_encode( array("status" => "failed", "res" => "cURL Error #:" . $err) );
} else {
  echo $response;
   //echo json_encode( array("status" => "success", "res" => $response) );
}