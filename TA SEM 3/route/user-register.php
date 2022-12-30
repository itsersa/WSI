<?php

include "../koneksi.php";

if (isset($_POST['submit'])) {
    $tampung = [
        $fullname = $_POST['fullname'],
        $username = $_POST['username'],
        $password = $_POST['password'],
        $cpassword = $_POST['password-valid']
    ];

    echo "<pre>";
    print_r($_POST);

    // if ($password == $cpassword) {
    //     $query = "SELECT * FROM user_register WHERE username = '$username'";
    //     $result = mysqli_query($koneksi, $query);
    //     $validation  = mysqli_num_rows($result);

    //     if (!$validation > 0) {
    //         $query = "INSERT INTO user_register(id, nama, username, password) values (NULL, '$fullname', '$username', '$password')";
    //         $result = mysqli_query($koneksi, $query);

    //         $query2 = "INSERT INTO user_login(id, username, password) values (NULL, '$username', '$password')";
    //         $result2 = mysqli_query($koneksi, $query2);
    //         if ($result & $result2) {
    //             echo "<script>alert('berhasil')</script>";
    //             header("Location: ../login.php");
    //         } else {
    //             header("Location: ../register.php?error=gagal");
    //         }
    //     } else {
    //         header("Location: ../register.php?error=username telah terdaftar");
    //     }
    // } else {
    //     header("Location: ../register.php?error=tidak cocok!");
    // }
}
