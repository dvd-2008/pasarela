<?php
// Simular procesamiento de pago
$respuesta = array(
    'success' => true,
    'mensaje' => '¡Pago realizado con éxito!'
);

// Simular respuesta en JSON
header('Content-Type: application/json');
echo json_encode($respuesta);
?>
