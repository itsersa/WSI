<?php

include("koneksi.php");

$tglsekarang = date("Y-m-d");

$query = "SELECT * FROM visitor WHERE MONTH(waktu_visit)";
$result = $koneksi->query($query);

print_r($query);

$visit = $result->num_rows;
echo "jumlah visitor : $visit";
