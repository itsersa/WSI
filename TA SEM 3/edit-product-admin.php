<?php

session_start();
$id = ($_GET['id']);
include "rupiah.php";

if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <body class="sb-nav-fixed">
        <!-- PARTIAL KERANGKA DASHBOARD -->
        <?= include('./partials/rangka.php') ?>

        <div id="layoutSidenav_content">
            <main>
                <form action="edit-product-admin.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">

                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Product Here !</li>
                        </ol>
                        <div class="row">
                            <?php
                            include "koneksi.php";

                            $id = ($_GET['id']);
                            // print_r($id);

                            $query = "SELECT * FROM produk WHERE id = '$id'";
                            $result = mysqli_query($koneksi, $query);
                            $data = mysqli_fetch_array($result);

                            // echo "<pre>";
                            // print_r($data);
                            ?>
                            <div class="col-xl-3 col-md-1">
                                <div class="card" style="width: 180px;">
                                    <img id="frame" style="width: 180px" ; src="gambar/<?= $data['image'] ?>" class="card-img-top" alt="admin logo">
                                </div>
                            </div>

                            <!-- MENAMPILKAN SESSION DATA ADMIN -->
                            <div class="form-group col-md-3">
                                <div class="mb-2">
                                    <label for="inputNama">Nama Produk :</label>
                                    <input type="text" class="form-control" name="nama" id="inputNama" value="<?= $data['nama_produk'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="inputPicture">Foto Produk 1 :</label>
                                    <input type="file" class="form-control" id="inputPicture" name="gambarProduk">
                                </div>
                                <div class="mb-2">
                                    <label for="inputPicture">Foto Produk 2 :</label>
                                    <input type="file" class="form-control" id="inputPicture" name="gambarProduk2">
                                </div>
                            </div>

                            <!-- MENAMPILKAN SESSION DATA ADMIN -->
                            <div class="form-group col-md-3">
                                <div class="mb-2">
                                    <label for="inputPicture">Foto Produk 3 :</label>
                                    <input type="file" class="form-control" id="inputPicture" name="gambarProduk3">
                                </div>
                                <div class="mb-2">
                                    <label for="inputPicture">Foto Produk 4 :</label>
                                    <input type="file" class="form-control" id="inputPicture" name="gambarProduk4">
                                </div>
                                <div class="mb-2">
                                    <label for="inputPicture">Foto Produk 5 :</label>
                                    <input type="file" class="form-control" id="inputPicture" name="gambarProduk5">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="mb-2">
                                    <label for="inputPicture">Foto Utama :</label>
                                    <input type="file" class="form-control" id="inputPicture" name="gambarUtama">
                                </div>
                                <p class="mt-2 ">
                                    <button class="btn btn-outline-success" style="width:49%" name="submit" type="submit" onclick="return confirm('Refresh setelah ubah data')">Update</button>
                                    <a href="product-admin.php" class="btn btn-outline-warning" name="back" type="submit" style="width:49%">Back</a>
                                </p>
                            </div>
                        </div>

                    </div>
                </form>
                <?php

                if (isset($_POST['submit'])) {

                    // FORM
                    $nama_produk = $_POST['nama'];

                    // IMAGE
                    echo "<pre>";

                    $img_name_utama = $_FILES['gambarUtama']['name'];
                    $img_size_utama = $_FILES['gambarUtama']['size'];
                    $tmp_name_utama = $_FILES['gambarUtama']['tmp_name'];
                    $error_utama = $_FILES['gambarUtama']['error'];

                    $img_name = $_FILES['gambarProduk']['name'];
                    $img_size = $_FILES['gambarProduk']['size'];
                    $tmp_name = $_FILES['gambarProduk']['tmp_name'];
                    $error = $_FILES['gambarProduk']['error'];

                    $img_name2 = $_FILES['gambarProduk2']['name'];
                    $img_size2 = $_FILES['gambarProduk2']['size'];
                    $tmp_name2 = $_FILES['gambarProduk2']['tmp_name'];
                    $error2 = $_FILES['gambarProduk2']['error'];

                    $img_name3 = $_FILES['gambarProduk3']['name'];
                    $img_size3 = $_FILES['gambarProduk3']['size'];
                    $tmp_name3 = $_FILES['gambarProduk3']['tmp_name'];
                    $error3 = $_FILES['gambarProduk3']['error'];

                    $img_name4 = $_FILES['gambarProduk4']['name'];
                    $img_size4 = $_FILES['gambarProduk4']['size'];
                    $tmp_name4 = $_FILES['gambarProduk4']['tmp_name'];
                    $error4 = $_FILES['gambarProduk4']['error'];

                    $img_name5 = $_FILES['gambarProduk5']['name'];
                    $img_size5 = $_FILES['gambarProduk5']['size'];
                    $tmp_name5 = $_FILES['gambarProduk5']['tmp_name'];
                    $error5 = $_FILES['gambarProduk5']['error'];


                    if ($error_utama === 0) {
                        if ($img_size_utama > 1250000) {
                            $txt = "File Terlalu Besar!";
                            header("Location: edit-admin-table.php?error=$txt");
                        } else {
                            $img_ex_utama = pathinfo($img_name_utama, PATHINFO_EXTENSION);
                            $img_ex_lc_utama = strtolower($img_ex_utama);

                            $allowed_exs = array("jpg", "jpeg", "png");

                            if (in_array($img_ex_lc_utama, $allowed_exs)) {
                                $new_image_name_utama = uniqid("IMG-", true) . '.' . $img_ex_lc_utama;
                                $img_upload_path_utama = 'gambar/' . $new_image_name_utama;
                                move_uploaded_file($tmp_name_utama, $img_upload_path_utama);

                                $query = "UPDATE produk SET nama_produk = '$nama_produk', imageUtama = '$new_image_name_utama' WHERE id = '$id'";
                                // print_r($query);

                                $result = mysqli_query($koneksi, $query);
                                echo "<meta http-equiv='refresh' content='1; url=http://localhost/wsi/WSI/TA%20SEM%203/edit-product-admin.php?id={$id}'>";
                            } else {
                                $txt = "Format Tidak Didukung";
                                header("Location: edit-product-admin.php?error=$txt");
                            }
                        }
                    }
                    if ($error === 0) {
                        if ($img_size > 1250000) {
                            $txt = "File Terlalu Besar!";
                            header("Location: edit-admin-table.php?error=$txt");
                        } else {
                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                            $img_ex_lc = strtolower($img_ex);

                            $allowed_exs = array("jpg", "jpeg", "png");

                            if (in_array($img_ex_lc, $allowed_exs)) {
                                $new_image_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                $img_upload_path = 'gambar/' . $new_image_name;
                                move_uploaded_file($tmp_name, $img_upload_path);

                                $query = "UPDATE produk SET nama_produk = '$nama_produk', image = '$new_image_name' WHERE id = '$id'";
                                // print_r($query);

                                $result = mysqli_query($koneksi, $query);
                                echo "<meta http-equiv='refresh' content='1; url=http://localhost/wsi/WSI/TA%20SEM%203/edit-product-admin.php?id={$id}'>";
                            } else {
                                $txt = "Format Tidak Didukung";
                                header("Location: edit-product-admin.php?error=$txt");
                            }
                        }
                    }
                    if ($error2 === 0) {
                        if ($img_size2 > 1250000) {
                            $txt = "File Terlalu Besar!";
                            header("Location: edit-admin-table.php?error=$txt");
                        } else {
                            $img_ex2 = pathinfo($img_name2, PATHINFO_EXTENSION);
                            $img_ex_lc2 = strtolower($img_ex2);

                            $allowed_exs = array("jpg", "jpeg", "png");

                            if (in_array($img_ex_lc2, $allowed_exs)) {
                                $new_image_name2 = uniqid("IMG-", true) . '.' . $img_ex_lc2;
                                $img_upload_path2 = 'gambar/' . $new_image_name2;
                                move_uploaded_file($tmp_name2, $img_upload_path2);

                                $query = "UPDATE produk SET nama_produk = '$nama_produk', image2 = '$new_image_name2' WHERE id = '$id'";
                                // print_r($query);

                                $result = mysqli_query($koneksi, $query);
                                echo "<meta http-equiv='refresh' content='1; url=http://localhost/wsi/WSI/TA%20SEM%203/edit-product-admin.php?id={$id}'>";
                            } else {
                                $txt = "Format Tidak Didukung";
                                header("Location: edit-product-admin.php?error=$txt");
                            }
                        }
                    }
                    if ($error3 === 0) {
                        if ($img_size3 > 1250000) {
                            $txt = "File Terlalu Besar!";
                            header("Location: edit-admin-table.php?error=$txt");
                        } else {
                            $img_ex3 = pathinfo($img_name3, PATHINFO_EXTENSION);
                            $img_ex_lc3 = strtolower($img_ex3);

                            $allowed_exs = array("jpg", "jpeg", "png");

                            if (in_array($img_ex_lc3, $allowed_exs)) {
                                $new_image_name3 = uniqid("IMG-", true) . '.' . $img_ex_lc3;
                                $img_upload_path3 = 'gambar/' . $new_image_name3;
                                move_uploaded_file($tmp_name3, $img_upload_path3);

                                $query = "UPDATE produk SET nama_produk = '$nama_produk', image3 = '$new_image_name3' WHERE id = '$id'";
                                // print_r($query);

                                $result = mysqli_query($koneksi, $query);
                                echo "<meta http-equiv='refresh' content='1; url=http://localhost/wsi/WSI/TA%20SEM%203/edit-product-admin.php?id={$id}'>";
                            } else {
                                $txt = "Format Tidak Didukung";
                                header("Location: edit-product-admin.php?error=$txt");
                            }
                        }
                    }
                    if ($error4 === 0) {
                        if ($img_size4 > 1250000) {
                            $txt = "File Terlalu Besar!";
                            header("Location: edit-admin-table.php?error=$txt");
                        } else {
                            $img_ex4 = pathinfo($img_name4, PATHINFO_EXTENSION);
                            $img_ex_lc4 = strtolower($img_ex4);

                            $allowed_exs = array("jpg", "jpeg", "png");

                            if (in_array($img_ex_lc4, $allowed_exs)) {
                                $new_image_name4 = uniqid("IMG-", true) . '.' . $img_ex_lc4;
                                $img_upload_path4 = 'gambar/' . $new_image_name4;
                                move_uploaded_file($tmp_name4, $img_upload_path4);

                                $query = "UPDATE produk SET nama_produk = '$nama_produk', image4 = '$new_image_name4' WHERE id = '$id'";
                                // print_r($query);

                                $result = mysqli_query($koneksi, $query);
                                echo "<meta http-equiv='refresh' content='1; url=http://localhost/wsi/WSI/TA%20SEM%203/edit-product-admin.php?id={$id}'>";
                            } else {
                                $txt = "Format Tidak Didukung";
                                header("Location: edit-product-admin.php?error=$txt");
                            }
                        }
                    }
                    if ($error5 === 0) {
                        if ($img_size5 > 1250000) {
                            $txt = "File Terlalu Besar!";
                            header("Location: edit-admin-table.php?error=$txt");
                        } else {
                            $img_ex5 = pathinfo($img_name5, PATHINFO_EXTENSION);
                            $img_ex_lc5 = strtolower($img_ex5);

                            $allowed_exs = array("jpg", "jpeg", "png");

                            if (in_array($img_ex_lc5, $allowed_exs)) {
                                $new_image_name5 = uniqid("IMG-", true) . '.' . $img_ex_lc5;
                                $img_upload_path5 = 'gambar/' . $new_image_name5;
                                move_uploaded_file($tmp_name5, $img_upload_path5);

                                $query = "UPDATE produk SET nama_produk = '$nama_produk', image5 = '$new_image_name5' WHERE id = '$id'";
                                // print_r($query);

                                $result = mysqli_query($koneksi, $query);
                                echo "<meta http-equiv='refresh' content='1; url=http://localhost/wsi/WSI/TA%20SEM%203/edit-product-admin.php?id={$id}'>";
                            } else {
                                $txt = "Format Tidak Didukung";
                                header("Location: edit-product-admin.php?error=$txt");
                            }
                        }
                    } else {
                        $query = "UPDATE produk SET nama_produk = '$nama_produk' WHERE id = '$id'";
                        // print_r($query);

                        $result = mysqli_query($koneksi, $query);
                        echo "<meta http-equiv='refresh' content='1; url=http://localhost/wsi/WSI/TA%20SEM%203/edit-product-admin.php?id={$id}'>";
                    }
                }
                ?>

            </main>

            <!-- PARTIAL KERANGKA FOOTER -->
            <?php include './partials/foo.php'; ?>
        </div>
    </body>

    </html>
<?php } else {
    header("Location: admin.php");
} ?>