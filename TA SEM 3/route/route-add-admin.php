<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {

    // FORM
    $nama_admin = addslashes($_POST['nama']);
    $username_admin = $_POST['username'];
    $notelp_admin = $_POST['notelp'];
    $password_admin = $_POST['password'];
    $jabatan_admin = $_POST['jabatan'];

    // IMAGE
    echo "<pre>";
    // print_r($_FILES['gambarAdmin']);

    $img_name = $_FILES['gambarAdmin']['name'];
    $img_size = $_FILES['gambarAdmin']['size'];
    $tmp_name = $_FILES['gambarAdmin']['tmp_name'];
    $error = $_FILES['gambarAdmin']['error'];

    // WITH IMAGE
    if ($error === 0) {
        if ($img_size > 1250000) {
            $txt = "File Terlalu Besar!";
            header("Location: ../add-admin.php?error=$txt");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_image_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../gambar/' . $new_image_name;
                move_uploaded_file($tmp_name, $img_upload_path);

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
                                         '$new_image_name', 
                                         '$notelp_admin', 
                                         '$username_admin', 
                                         '$password_admin', 
                                         '$jabatan_admin'
                                     )";
                // print_r($query);
                $result = mysqli_query($koneksi, $query);
                if ($result == true) {
                    $txt = "Berhasil Menambah Admin!";
                    header("Location: ../add-admin.php?success=$txt");
                }
            } else {
                $txt = "Format Tidak Didukung";
                header("Location: ../add-admin.php?error=$txt");
            }
            $txt = "Masukkan Data Form";
            header("Location: ../add-admin.php?error=$txt");
        }
    } else {
        $txt = "gagal!";
        header("Location: ../add-admin.php?success=$txt");
        
    }
} else {
    header("Location: add-admin.php");
}
