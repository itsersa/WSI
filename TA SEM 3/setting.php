<?php

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <body class="sb-nav-fixed">
        <!-- PARTIAL KERANGKA DASHBOARD -->
        <?= include('./partials/rangka.php') ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Profile</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Edit Profile Here !</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-1">
                            <div class="card" style="width: 15rem;">
                                <img src="assets-admin/img/owner.png" class="card-img-top" alt="admin logo">
                            </div>
                        </div>

                        <!-- MENAMPILKAN SESSION DATA ADMIN -->
                        <div class="form-group col-md-3">
                            <div>
                                <label for="inputNama">Nama :</label>
                                <input type="text" class="form-control" id="inputNama" value="<?= $_SESSION['nama'] ?>" readonly>
                            </div>
                            <div>
                                <label for="inputUsername">Username :</label>
                                <input type="text" class="form-control" id="inputUsername" value="<?= $_SESSION['username'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="inputPicture">Picture :</label>
                                <input type="file" class="form-control" id="inputPicture" value="">
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-success" type="button">Update</button>
                            </div>
                        </div>

                        <!-- MENAMPILKAN SESSION DATA ADMIN -->
                        <div class="form-group col-md-3">
                            <div>
                                <label for="inputNotelp">No.Telp</label>
                                <input type="text" class="form-control" id="inputNotelp" value="<?= $_SESSION['notelp'] ?>">
                            </div>
                            <div>
                                <label for="inputPassword">Password</label>
                                <input type="text" class="form-control" id="inputPassword" value="<?= $_SESSION['password'] ?>">
                            </div>
                            <div>
                                <label for="inputJabatan">Jabatan</label>
                                <input type="text" class="form-control" id="inputJabatan" value="<?= $_SESSION['jabatan'] ?>" readonly>
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