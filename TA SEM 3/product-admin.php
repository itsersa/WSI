<?php

session_start();
include "rupiah.php";

if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <body class="sb-nav-fixed">
        <!-- PARTIAL KERANGKA DASHBOARD -->
        <?= include('./partials/rangka.php') ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Settings Product</h1>
                    <ol class="breadcrumb mb-4">
                        <a style="text-decoration:none" href="product-admin-table.php">
                            <li class="breadcrumb-item active">--> Tampilan Tabel !</li>
                        </a>
                    </ol>
                    <div class="row">
                        <section class="container">
                            <div class="row py-lg-3">
                                <div class="col-md-8 mx-auto">
                                    <div class="card shadow">
                                        <div class="card-header bg-dark text-light">
                                            <h3 class="fw-light text-center">Form Input Product</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="product-admin.php" method="post" enctype="multipart/form-data">
                                                <div class="mb-2">
                                                    <label for="inputNama">Nama Produk :</label>
                                                    <input type="text" class="form-control" id="inputNama" name="nama">
                                                </div>

                                                <div class="row">
                                                    <div class="mb-2 col-md-5">
                                                        <label for="inputFoto">Foto Produk 1 :</label>
                                                        <input type="file" class="form-control" id="inputFoto" name="gambarProduk" required>
                                                    </div>
                                                    <div class="mb-2 col-md-5">
                                                        <label for="inputFoto">Foto Produk 2 :</label>
                                                        <input type="file" class="form-control" id="inputFoto" name="gambarProduk2" required>
                                                    </div>
                                                    <div class="mb-2 col-md-5">
                                                        <label for="inputFoto">Foto Produk 3 :</label>
                                                        <input type="file" class="form-control" id="inputFoto" name="gambarProduk3" required>
                                                    </div>
                                                    <div class="mb-2 col-md-5">
                                                        <label for="inputFoto">Foto Produk 4 :</label>
                                                        <input type="file" class="form-control" id="inputFoto" name="gambarProduk4" required>
                                                    </div>
                                                    <div class="mb-2 col-md-5">
                                                        <label for="inputFoto">Foto Produk 5 :</label>
                                                        <input type="file" class="form-control" id="inputFoto" name="gambarProduk5" required>
                                                    </div>
                                                    <div class="mb-2 col-md-5">
                                                        <label for="inputFoto">Foto Utama :</label>
                                                        <input type="file" class="form-control" id="inputFoto" name="gambarUtama" required>
                                                    </div>
                                                </div>
                                                <p class="mb-3 ">
                                                    <button type="submit" name="submit" class="btn btn-outline-success my-2" style="width:20%">Save</button>
                                                    <a href="dashboard.php" class="btn btn-outline-warning" name="back" type="submit" style="width:20%">Back</a>
                                                </p>
                                                <?php
                                                include "koneksi.php";

                                                if (isset($_POST['submit'])) {
                                                    $nama_produk = $_POST['nama'];

                                                    // IMAGE
                                                    echo "<pre>";
                                                    // print_r($_FILES['gambarProduk']);

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

                                                    if ($error === 0) {
                                                        if ($img_size > 1250000) {
                                                            $txt = "File Terlalu Besar!";
                                                            header("Location: product-admin.php?error=$txt");
                                                        } else {
                                                            $img_ex_utama = pathinfo($img_name_utama, PATHINFO_EXTENSION);
                                                            $img_ex_lc_utama = strtolower($img_ex_utama);

                                                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                                            $img_ex_lc = strtolower($img_ex);

                                                            $img_ex2 = pathinfo($img_name2, PATHINFO_EXTENSION);
                                                            $img_ex_lc2 = strtolower($img_ex2);

                                                            $img_ex3 = pathinfo($img_name3, PATHINFO_EXTENSION);
                                                            $img_ex_lc3 = strtolower($img_ex3);

                                                            $img_ex4 = pathinfo($img_name4, PATHINFO_EXTENSION);
                                                            $img_ex_lc4 = strtolower($img_ex4);

                                                            $img_ex5 = pathinfo($img_name5, PATHINFO_EXTENSION);
                                                            $img_ex_lc5 = strtolower($img_ex5);

                                                            $allowed_exs = array("jpg", "jpeg", "png");
                                                            if (in_array($img_ex_lc, $allowed_exs)) {
                                                                $new_image_name_utama = uniqid("IMG-", true) . '.' . $img_ex_lc_utama;
                                                                $img_upload_path_utama = 'gambar/' . $new_image_name_utama;
                                                                move_uploaded_file($tmp_name_utama, $img_upload_path_utama);

                                                                $new_image_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                                                $img_upload_path = 'gambar/' . $new_image_name;
                                                                move_uploaded_file($tmp_name, $img_upload_path);

                                                                $new_image_name2 = uniqid("IMG-", true) . '.' . $img_ex_lc2;
                                                                $img_upload_path2 = 'gambar/' . $new_image_name2;
                                                                move_uploaded_file($tmp_name2, $img_upload_path2);

                                                                $new_image_name3 = uniqid("IMG-", true) . '.' . $img_ex_lc3;
                                                                $img_upload_path3 = 'gambar/' . $new_image_name3;
                                                                move_uploaded_file($tmp_name3, $img_upload_path3);

                                                                $new_image_name4 = uniqid("IMG-", true) . '.' . $img_ex_lc4;
                                                                $img_upload_path4 = 'gambar/' . $new_image_name4;
                                                                move_uploaded_file($tmp_name4, $img_upload_path4);

                                                                $new_image_name5 = uniqid("IMG-", true) . '.' . $img_ex_lc5;
                                                                $img_upload_path5 = 'gambar/' . $new_image_name5;
                                                                move_uploaded_file($tmp_name5, $img_upload_path5);

                                                                $query = "INSERT INTO produk (
                                                                    id,
                                                                    nama_produk,
                                                                    imageUtama, 
                                                                    image, image2, image3, image4, image5 ) 
                                                                    VALUES (
                                                                         NULL,
                                                                        '$nama_produk',
                                                                        '$new_image_name_utama', 
                                                                        '$new_image_name',
                                                                        '$new_image_name2',
                                                                        '$new_image_name3',
                                                                        '$new_image_name4',
                                                                        '$new_image_name5'
                                                                    )";
                                                                // print_r($query);
                                                                $result = mysqli_query($koneksi, $query);
                                                                // echo "<meta http-equiv='refresh' content='1; url=http://localhost/wsi/WSI/TA%20SEM%203/product-admin.php'>";
                                                            } else {
                                                                $txt = "Format Tidak Didukung";
                                                                header("Location: product-admin.php?error=$txt");
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    header("Location: product-admin.php");
                                                }

                                                ?>
                                            </form>
                                        </div>
                                        <div class="card-footer bg-dark text-light">
                                            <!-- <button class="btn btn-outline-secondary my-1 text-right" style="width:40%">Tampilkan Dalam Bentuk Table</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="album py-5">
                            <div class="container">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                    <?php

                                    $query = mysqli_query($koneksi, "SELECT * FROM produk");
                                    while ($data = mysqli_fetch_array($query)) :
                                    ?>
                                        <div class="col-md-3">
                                            <div class="card shadow-sm">
                                                <img class="bd-placeholder-img card-img-top" height="225" src="gambar/<?= $data['image'] ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">

                                                <div class="card-body">
                                                    <h3 class="card-text"><?= $data['nama_produk'] ?></h3>

                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <a href="edit-product-admin.php?id=<?= $data['id'] ?>">
                                                                <button type="button" class="btn btn-sm btn-outline-success">Edit</button>
                                                            </a>
                                                            &nbsp;
                                                            <a href="delete-product-admin.php?id=<?= $data['id'] ?>">
                                                                <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- PARTIAL KERANGKA FOOTER -->
            <?php include './partials/foo.php'; ?>
        </div>

    </body>

    </html>

<?php } else {
    header("Location: admin.php");
} ?>