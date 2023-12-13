|<?php
/**
 * Ejemplo 8
 * Como añadir un suscriptor a un plan específico usando Culqi PHP.
 */

try {
  // Usando Composer
  require 'vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_KEY = "sk_live_9e8a2a39c334800a";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

  // Creando Cargo a una tarjeta
  $subscription = $culqi->Subscriptions->create(
    array(
        "card_id"=> "crd_live_okkEbY1KTctRkqOO",
        "plan_id" => "pln_live_NEkeliAcuGTnmRT7",
        "metadata" => array(
          "data" => "test"
      ),
        "tyc" => true
    )
  );

  // Respuesta
  echo json_encode($subscription);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}
