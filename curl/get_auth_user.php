<?php
$loginUrl = 'https://dummyjson.com/auth/login';
$loginData = json_encode([
    'username' => 'emilys',
    'password' => 'emilyspass'
]);
$ch = curl_init($loginUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $loginData);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);
curl_close($ch);
$result = json_decode($response, true);
echo "<pre>" . print_r($result, true) . "</pre>";
$responseData = json_decode($response, true);


