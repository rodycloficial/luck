<?php
session_start();
echo "Session ID: " . session_id() . "<br>";
echo "Session data: <pre>";
print_r($_SESSION);
echo "</pre>";

// Verificar si el usuario está autenticado via Laravel
$laravelSession = $_COOKIE['laravel-session'] ?? 'no cookie';
echo "laravel-session cookie: " . $laravelSession . "<br>";

// Intentar acceder a la API de auth
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://luck-production-2830.up.railway.app/api/user');
curl_setopt($ch, CURLOPT_COOKIE, 'laravel-session=' . $laravelSession);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
echo "API /user response: " . $response;