<?php

$koneksi = mysqli_connect(
    $server = 'localhost',
    $username = 'root',
    $password = '',
    $database = 'db_melody'
);

if (mysqli_connect_errno()) {
    echo "koneksi gagal : " . mysqli_connect_errno();
} else {
    // echo "berhasil tersambung dengan database";
}
