<?php
    include('session.php');
    if (!isset($_SESSION['accessToken']))
    {
        $ch = curl_init('https://dummyjson.com/auth/login');
        $data = json_encode([
            'username' => 'emilys',
            'password' => 'emilyspass'
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response, true);
        if (isset($responseData['accessToken']))
        {
            $_SESSION['accessToken']= $responseData['accessToken'];
            // echo "Authentication successful! Access Token:<br/> " . $responseData['accessToken'];
        } else {
            echo "Authentication failed!";
        }

    }
    else{
        header("Location: posts.php");
    }