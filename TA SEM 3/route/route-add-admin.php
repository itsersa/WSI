<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $nama_admin = addslashes($_POST['nama']);
    $username_admin = $_POST['username'];
    $notelp_admin = $_POST['notelp'];
    $password_admin = $_POST['password'];
    $jabatan_admin = $_POST['jabatan'];

    $query = "INSERT INTO admin_list (
        id, 
        nama_karyawan, 
        foto_karyawan, 
        notelp_karyawan, 
        username_karyawan, 
        password_karyawan, 
        role ) 
        VALUES (
            NULL, 
            '$nama_admin', 
            '', 
            '$notelp_admin', 
            '$username_admin', 
            '$password_admin', 
            '$jabatan_admin'
        )";
    // print_r($query);
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: ../add-admin.php?success=berhasil tambah");
    } else {
        echo "Failed: " . mysqli_error($koneksi);
    }
}
