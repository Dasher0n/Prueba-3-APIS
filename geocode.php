<?php
// Obtener los parámetros para usar en la URL
$lat = $_GET["lat"];
$lng = $_GET["lng"];
$apiKey = "APIKEYPRIVADA"; // API key de Google

// URL para consumir el API
$url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&key=$apiKey";

// Obtener la respuesta de la API
$response = file_get_contents($url);
$data = json_decode($response, true);

// Obtener la dirección formateada
$address = $data["results"][0]["formatted_address"];

// Devolver la dirección en formato JSON
echo json_encode(["address" => $address]);
?>
