<?php
require('../koneksi.php');

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    if (empty($username) && empty($password)) {
        header("Location: ../admin.php?error=Masukkan Username dan Password!");
    } else if (empty($username)) {
        header("Location: ../admin.php?error=Masukkan Username!");
    } else if (empty($password)) {
        header("Location: ../admin.php?error=Masukkan Password!");
    } else {
        $query = "SELECT * FROM admin_list where username_karyawan = '$username' and password_karyawan = '$password'";
        print_r($query);
        $result = mysqli_query($koneksi, $query);
        $num  = mysqli_num_rows($result);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            echo "<pre>";
            // print_r($row);
            if ($row['username_karyawan'] === $username && $row['password_karyawan'] == $password) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['nama'] = $row['nama_karyawan'];
                $_SESSION['foto'] = $row['foto_karyawan'];
                $_SESSION['notelp'] = $row['notelp_karyawan'];
                $_SESSION['username'] = $row['username_karyawan'];
                $_SESSION['password'] = $row['password_karyawan'];
                $_SESSION['jabatan'] = $row['role'];

                print_r($_SESSION);
                header("Location: ../dashboard.php");
            }
        } else {
            header("Location: ../admin.php?error=Username / Password Salah");
        }
    }
} else {
    header("Location: ../admin.php");
}
