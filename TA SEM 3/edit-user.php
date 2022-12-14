<?php

session_start();
$id = ($_GET['id']);

if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <body class="sb-nav-fixed">
        <!-- PARTIAL KERANGKA DASHBOARD -->
        <?= include('./partials/rangka.php') ?>

        <div id="layoutSidenav_content">
            <main>
                <form action="edit-user.php?id=<?= $id ?>" method="post">

                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Profile</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Profile Here !</li>
                        </ol>
                        <div class="row">
                            <?php
                            include "koneksi.php";

                            $id = ($_GET['id']);
                            // print_r($id);

                            $query = "SELECT * FROM user_register WHERE id = '$id'";
                            $result = mysqli_query($koneksi, $query);
                            $data = mysqli_fetch_array($result);

                            // echo "<pre>";
                            // print_r($data);
                            ?>
                            <div class="col-xl-3 col-md-1">
                                <div class="card" style="width: 180px;">
                                    <img style="width: 180px" ; src="gambar/" class="card-img-top" alt="admin logo">
                                </div>
                            </div>

                            <!-- MENAMPILKAN SESSION DATA ADMIN -->
                            <div class="form-group col-md-3">
                                <div class="mb-2">
                                    <label for="inputNama">Nama :</label>
                                    <input type="text" class="form-control" name="nama" id="inputNama" value="<?= $data['nama'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="inputPassword">Password</label>
                                    <input type="text" class="form-control" name="password" id="inputPassword" value="<?= $data['password'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="inputPicture">Picture :</label>
                                    <input type="file" class="form-control" id="inputPicture" value="">
                                </div>
                            </div>

                            <!-- MENAMPILKAN SESSION DATA ADMIN -->
                            <div class="form-group col-md-3">
                                <div class="mb-2">
                                    <label for="inputUsername">Username :</label>
                                    <input type="text" class="form-control" name="username" id="inputUsername" value="<?= $data['username'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="inputJabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="inputJabatan" value="<?= $data['role'] ?>" readonly>
                                </div>
                                <p class="mt-2 ">
                                    <button class="btn btn-outline-success" style="width:49%" name="submit" type="submit" onclick="return confirm('Refresh setelah ubah data')">Update</button>
                                    <a href="list-user.php" class="btn btn-outline-warning" name="back" type="submit" style="width:49%">Back</a>
                                </p>
                            </div>

                        </div>
                </form>
                <?php

                if (isset($_POST['submit'])) {

                    $nama = $_POST['nama'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // print_r($username);
                    $query = "UPDATE user_register SET nama = '$nama', username = '$username', password = '$password' WHERE id = '$id'";
                    // print_r($query);

                    $result = mysqli_query($koneksi, $query);
                    echo "<meta http-equiv='refresh' content='1; url=http://localhost/wsi/WSI/TA%20SEM%203/edit-user.php?id={$id}' >";
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