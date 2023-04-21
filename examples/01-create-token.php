<?php

require '../vendor/autoload.php';

date_default_timezone_set('America/Lima');

try {
  $PUBLIC_KEY = "{PUBLIC KEY}";
  $culqi = new Culqi\Culqi(array('api_key' => $PUBLIC_KEY));
  $futureDate = date('Y', strtotime('+1 year'));
  $encryption_data = array(
    "rsa_public_key" => "",
    "rsa_id" => ""
  );
    
  // Creando token a una tarjeta sin encriptar
  $token = $culqi->Tokens->create(
      array(
        "card_number" => "4111111111111111",
        "cvv" => "123",
        "email" => "culqi".uniqid()."@culqi.com", //email must not repeated
        "expiration_month" => "7",
        "expiration_year" => $futureDate,
        "fingerprint" => uniqid(),
        "metadata" => array("dni" => "71702935")
      ),
      ''
  );
  // Respuesta
  echo json_encode("Token sin encriptar payload: ".$token->id)."<br>";


  // Creando token a una tarjeta con encriptación
  $token = $culqi->Tokens->create(
    array(
      "card_number" => "4111111111111111",
      "cvv" => "123",
      "email" => "culqi".uniqid()."@culqi.com", //email must not repeated
      "expiration_month" => "7",
      "expiration_year" => $futureDate,
      "fingerprint" => uniqid(),
      "metadata" => array("dni" => "71702935")
    ),
    $encryption_data
);
// Respuesta
echo json_encode("Token con encriptar payload: ".$token->id);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}