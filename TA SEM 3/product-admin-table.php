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
                        <a style="text-decoration:none" href="product-admin.php">
                            <li class="breadcrumb-item active">--> Tampilan Gallery !</li>
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
                                            <form action="product-admin-table.php" method="post" enctype="multipart/form-data">
                                                <div class="mb-2">
                                                    <label for="inputNama">Nama Produk :</label>
                                                    <input type="text" class="form-control" id="inputNama" name="nama">
                                                </div>
                                                <div class="mb-2">
                                                    <span id="formatRupiah" for="inputHarga">Harga :</span>
                                                    <input type="text" class="form-control" name="harga" id="rupiah" placeholder="rupiah" onkeyup="document.getElementById('formatRupiah').innerHTML = formatCurrency(this.value);">
                                                </div>
                                                <script type="text/javascript">
                                                    function formatCurrency(rupiah) {
                                                        rupiah = rupiah.toString().replace(/\$|\,/g, '');
                                                        if (isNaN(rupiah))
                                                            rupiah = 0;
                                                        sign = (rupiah == (rupiah = Math.abs(rupiah)));
                                                        rupiah = Math.floor(rupiah * 100 + 0.50000000001);
                                                        cents = rupiah % 100;
                                                        rupiah = Math.floor(rupiah / 100).toString();
                                                        if (cents < 10)
                                                            cents = "0" + cents;
                                                        for (var i = 0; i < Math.floor((rupiah.length - (1 + i)) / 3); i++)
                                                            rupiah = rupiah.substring(0, rupiah.length - (4 * i + 3)) + '.' + rupiah.substring(rupiah.length - (4 * i + 3));
                                                        return (((sign) ? '' : '-') + 'Rp.' + rupiah + ',' + cents);
                                                    }
                                                </script>
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
                                                            header("Location: product-admin-table.php?error=$txt");
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
                                                                // echo "<meta http-equiv='refresh' content='1; url=http://localhost/wsi/WSI/TA%20SEM%203/product-admin-table.php'>";
                                                            } else {
                                                                $txt = "Format Tidak Didukung";
                                                                header("Location: product-admin-table.php?error=$txt");
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    header("Location: product-admin-table.php");
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
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Admin
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>No</th>
                                        <th>Foto</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Deskripsi Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>No</th>
                                        <th>Foto</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Deskripsi Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    include "koneksi.php";

                                    $nomer = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM produk");
                                    while ($data = mysqli_fetch_array($query)) :
                                        $noid = $data['id'];
                                    ?>
                                        <tr>
                                            <td><?= $nomer++ ?></td>
                                            <td hidden><?= $noid ?></td>
                                            <td><img style="width: 120px" src="gambar/<?= $data['image'] ?>" alt="foto produk"></td>
                                            <td><?= $data['nama_produk'] ?></td>
                                            <td><?= rupiah($data['harga']) ?></td>
                                            <td><?= $data['deskripsi_produk'] ?></td>
                                            <td>
                                                <a href="edit-product-admin-table.php?id=<?= $noid ?>">
                                                    <button class="btn btn-outline-success" type="button">
                                                        <i class="fas fa-address-card"></i>
                                                    </button>
                                                </a>
                                                <a href="delete-product-admin-table.php?id=<?= $noid ?>" onclick="return confirm('Delete This Admin?')">
                                                    <button class="btn btn-outline-danger" type="button">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
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