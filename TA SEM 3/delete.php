<?php

include "koneksi.php";

$id = $_GET['id'];

$queryAdmin = "DELETE FROM admin_list WHERE id = $id";
$queryUser = "DELETE FROM user_register where id = $id";
// print_r($query);

$deleteAdmin = mysqli_query($koneksi, $queryAdmin);
$deleteUser = mysqli_query($koneksi, $queryUser);

if ($deleteAdmin) {
    header("Location: list-admin.php");
    if ($deleteUser) {
        header("Location: list-user.php");
    }
} else {
    echo "Failed: " . mysqli_error($koneksi);
};
