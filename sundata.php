<?php
// Obtener los parámetros de la URL
$latSOL = $_GET["latSOL"];
$lngSOL = $_GET["lngSOL"];
$apiKey = "AIzaSyCv3pC0wjVCsaDaNcoD04fEAEYNDpYVs-c"; // APIkey de Google

// URL para consumir el API
$url = "https://solar.googleapis.com/v1/dataLayers:get?location.latitude=$latSOL&location.longitude=$lngSOL&radiusMeters=100&view=FULL_LAYERS&requiredQuality=HIGH&exactQualityRequired=true&pixelSizeMeters=0.5&key=$apiKey";

// Inicializar cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Realizar la solicitud
$response = curl_exec($ch);

// Devolver la respuesta
echo $response;

// Cerrar cURL
curl_close($ch);
?>