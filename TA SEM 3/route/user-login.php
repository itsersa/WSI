<?php

include "../koneksi.php";

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
        header("Location: ../login.php?error=Masukkan Username dan Password!");
    } else if (empty($username)) {
        header("Location: ../login.php?error=Masukkan Username!");
    } else if (empty($password)) {
        header("Location: ../login.php?error=Masukkan Password!");
    } else {
        $query = "SELECT * FROM user_login WHERE username = '$username' AND password = '$password'";
        print_r($query);
        $result = mysqli_query($koneksi, $query);
        $num  = mysqli_num_rows($result);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            echo "<pre>";
            print_r($row);
            if ($row['username'] === $username && $row['password'] == $password) {
                // print_r($_SESSION);
                echo "<script>alert('berhasil')</script>";
                // header("Location: ../dashboard.php");
            }
        } else {
            header("Location: ../login.php?error=Username / Password Salah");
        }
    }
} else {
    header("Location: ../login.php");
}
