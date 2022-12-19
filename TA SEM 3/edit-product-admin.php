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
                                    <img style="width: 180px" ; src="gambar/<?= $data['image'] ?>" class="card-img-top" alt="admin logo">
                                </div>
                            </div>

                            <!-- MENAMPILKAN SESSION DATA ADMIN -->
                            <div class="form-group col-md-3">
                                <div class="mb-2">
                                    <label for="inputNama">Nama Produk :</label>
                                    <input type="text" class="form-control" name="nama" id="inputNama" value="<?= $data['nama_produk'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="inputHarga">Harga :</label>
                                    <input type="text" class="form-control" name="harga" id="inputHarga" value="<?= $data['harga'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="inputPicture">Foto Produk :</label>
                                    <input type="file" class="form-control" id="inputPicture" name="gambarProduk">
                                </div>

                            </div>

                            <!-- MENAMPILKAN SESSION DATA ADMIN -->
                            <div class="form-group col-md-3">
                                <div class="mb-2">
                                    <label for="inputDeskripsi">Deskripsi Produk :</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" name="detail"><?= $data['deskripsi_produk'] ?></textarea>
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
                    $harga_produk = $_POST['harga'];
                    $detail_produk = $_POST['detail'];

                    // IMAGE
                    echo "<pre>";
                    print_r($detail_produk);

                    $img_name = $_FILES['gambarProduk']['name'];
                    $img_size = $_FILES['gambarProduk']['size'];
                    $tmp_name = $_FILES['gambarProduk']['tmp_name'];
                    $error = $_FILES['gambarProduk']['error'];

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

                                $query = "UPDATE produk SET nama_produk = '$nama_produk', image = '$new_image_name', harga = '$harga_produk', deskripsi_produk = '$detail_produk' WHERE id = '$id'";
                                print_r($query);

                                $result = mysqli_query($koneksi, $query);
                                echo "<meta http-equiv='refresh' content='1; url=http://localhost/wsi/WSI/TA%20SEM%203/edit-product-admin.php?id={$id}'>";
                            } else {
                                $txt = "Format Tidak Didukung";
                                header("Location: edit-product-admin.php?error=$txt");
                            }
                        }
                    } else {
                        $query = "UPDATE produk SET nama_produk = '$nama_produk', harga = '$harga_produk', deskripsi_produk = '$detail_produk' WHERE id = '$id'";
                        print_r($query);

                        $result = mysqli_query($koneksi, $query);
                        echo "<meta http-equiv='refresh' content='1; url=http://localhost/wsi/WSI/TA%20SEM%203/edit-product-admin.php?id={$id}'>";
                    }
                }
                ?>

            </main>

            <!-- PARTIAL KERANGKA FOOTER -->
            <?= include('./partials/foo.php') ?>
        </div>
    </body>

    </html>
<?php } else {
    header("Location: admin.php");
} ?>