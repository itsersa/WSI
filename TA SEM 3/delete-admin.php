<?php

require('koneksi.php');

// $id = $_GET['id'];

// $queryAdmin = "DELETE FROM admin_list WHERE id = $id";
// $queryUser = "DELETE FROM user_register where id = $id";
// print_r($query);

// $deleteAdmin = mysqli_query($koneksi, $queryAdmin);
// $deleteUser = mysqli_query($koneksi, $queryUser);

// if ($deleteAdmin) {
//     header("Location: list-admin.php");
// } else  if ($deleteUser) {
//     header("Location: list-user.php");
// } {
//     echo "Failed: " . mysqli_error($koneksi);
// };

if (isset($_GET['id'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);
    $queryAdmin = "DELETE FROM admin_list WHERE id = $id";
    $deleteAdmin = mysqli_query($koneksi, $queryAdmin);

    if ($deleteAdmin) {
        header("Location: list-admin.php?success=berhasil delete");
    } 
    
}
