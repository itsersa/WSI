<?php
include "koneksi.php";

// DELETE
if (isset($_GET['id'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);
    $queryAdmin = "DELETE FROM produk WHERE id = $id";
    $deleteAdmin = mysqli_query($koneksi, $queryAdmin);

    if ($deleteAdmin) {
        header("Location: product-admin-table.php");
    }
}
