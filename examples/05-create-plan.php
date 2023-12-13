<?php
/**
 * Ejemplo 5
 * Como crear un plan usando Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require 'vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_KEY = "sk_live_9e8a2a39c334800a";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

  // Creando Cargo a una tarjeta
  $plan = $culqi->Plans->create(
    array(
        "interval_unit_time" => 3,
        "interval_count" => 0,
        "amount" => 350,
        "name" => "Plan mensual" . uniqid(),
        "description" => "Plan-description" . uniqid(),
        "short_name" => "pln-" . uniqid(),
        "currency" => "PEN",
        "metadata" => json_decode('{}'),
        "initial_cycles" => array(
            "count" => 2,
            "amount" => 0,
            "has_initial_charge" => false,
            "interval_unit_time" => 3
        ),
    )
);
  // Respuesta
  echo json_encode($plan);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}
