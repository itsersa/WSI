<?php

include("koneksi.php");

// mencatat session
session_start();
$idsession = session_id();

// mencatat ipaddress
$ipaddress = '';
if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
else if (isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
else if (isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];

$query = "INSERT INTO visitor(id, idsession, ipaddress) value (NULL, '$idsession', '$ipaddress')";
// print_r($query);
$result = $koneksi->query($query);
