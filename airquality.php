<?php
// Obtener los datos del cuerpo de la solicitud
$data = json_decode(file_get_contents("php://input"), true);

$lat = $data["location"]["latitude"];
$lng = $data["location"]["longitude"];
$apiKey = "AIzaSyCv3pC0wjVCsaDaNcoD04fEAEYNDpYVs-c"; // Reemplaza con tu clave de API

// Datos para la solicitud
$requestData = [
    "universalAqi" => true,
    "location" => [
        "latitude" => $lat,
        "longitude" => $lng
    ]
];

// Inicializar cURL
$ch = curl_init();

// Configurar cURL
curl_setopt($ch, CURLOPT_URL, "https://airquality.googleapis.com/v1/currentConditions:lookup?key=$apiKey");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);

// Realizar la solicitud
$response = curl_exec($ch);

// Devolver la respuesta
echo $response;

// Cerrar cURL
curl_close($ch);
?>