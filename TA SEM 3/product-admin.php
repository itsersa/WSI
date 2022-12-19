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
                                                <div class="mb-2">
                                                    <label for="inputHarga">Harga :</label>
                                                    <input type="number" class="form-control" id="inputHarga" name="harga">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="inputDetail">Detail Produk :</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detail"></textarea>
                                                    <!-- <input type="text" class="form-control" id="inputNama" name=""> -->
                                                </div>
                                                <div class="mb-2 col-md-5">
                                                    <label for="inputFoto">Foto Produk :</label>
                                                    <input type="file" class="form-control" id="inputFoto" name="gambarProduk" required>
                                                </div>
                                                <p class="mt-3 ">
                                                    <button type="submit" name="submit" class="btn btn-outline-success my-2" style="width:20%">Save</button>
                                                    <button class="btn btn-outline-warning my-2" style="width:20%">Reset</button>
                                                </p>
                                                <?php
                                                include "koneksi.php";

                                                if (isset($_POST['submit'])) {
                                                    $nama_produk = $_POST['nama'];
                                                    $harga_produk = $_POST['harga'];
                                                    $detail_produk = $_POST['detail'];

                                                    // IMAGE
                                                    echo "<pre>";
                                                    // print_r($_FILES['gambarProduk']);

                                                    $img_name = $_FILES['gambarProduk']['name'];
                                                    $img_size = $_FILES['gambarProduk']['size'];
                                                    $tmp_name = $_FILES['gambarProduk']['tmp_name'];
                                                    $error = $_FILES['gambarProduk']['error'];

                                                    if ($error === 0) {
                                                        if ($img_size > 1250000) {
                                                            $txt = "File Terlalu Besar!";
                                                            header("Location: product-admin.php?error=$txt");
                                                        } else {
                                                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                                            $img_ex_lc = strtolower($img_ex);

                                                            $allowed_exs = array("jpg", "jpeg", "png");
                                                            if (in_array($img_ex_lc, $allowed_exs)) {
                                                                $new_image_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                                                $img_upload_path = 'gambar/' . $new_image_name;
                                                                move_uploaded_file($tmp_name, $img_upload_path);

                                                                $query = "INSERT INTO produk (
                                                                    id,
                                                                    nama_produk, 
                                                                    harga, 
                                                                    deskripsi_produk, image ) 
                                                                    VALUES (
                                                                         NULL,
                                                                        '$nama_produk', 
                                                                        '$harga_produk', 
                                                                        '$detail_produk',
                                                                        '$new_image_name'
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
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="gambar/<?= $data['image'] ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">

                                                <div class="card-body">
                                                    <h3 class="card-text"><?= $data['nama_produk'] ?></h3>

                                                    <p class="card-text"><?= $data['deskripsi_produk'] ?></p>
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
                                                        <small class="text-muted"><?= rupiah($data['harga']) ?></small>
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
            <?= include('./partials/foo.php') ?>
        </div>

    </body>

    </html>

<?php } else {
    header("Location: admin.php");
} ?>