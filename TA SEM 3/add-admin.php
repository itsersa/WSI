<?php

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <body class="sb-nav-fixed">
        <!-- PARTIAL KERANGKA DASHBOARD-->
        <?= include('./partials/rangka.php') ?>

        <div id="layoutSidenav_content">
            <form action="route/route-add-admin.php" method="post" enctype="multipart/form-data">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Admin Here !</li>
                        </ol>

                        <!-- SUCCESS -->
                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?= $_GET['success'] ?>
                            </div>
                        <?php } ?>

                        <!-- ERROR -->
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_GET['error'] ?>
                            </div>
                        <?php } ?>

                        <div class="row">
                            <div class="col-xl-3 col-md-1">
                                <div class="card" style="width: 15rem;">
                                    <img src="" class="card-img-top" alt="admin logo">
                                </div>
                            </div>

                            <!-- MENAMPILKAN SESSION DATA ADMIN -->
                            <div class="form-group col-md-3">
                                <div class="mb-2">
                                    <label for="inputNama">Nama :</label>
                                    <input type="text" class="form-control" id="inputNama" name="nama">
                                </div>
                                <div class="mb-2">
                                    <label for="inputUsername">Username :</label>
                                    <input type="text" class="form-control" id="inputUsername" name="username">
                                </div>
                                <div class="mb-2">
                                    <label for="inputPicture">Picture :</label>
                                    <input type="file" class="form-control" id="inputPicture" name="gambarAdmin">
                                </div>
                            </div>

                            <!-- MENAMPILKAN SESSION DATA ADMIN -->
                            <div class="form-group col-md-3">
                                <div class="mb-2">
                                    <label for="inputNotelp">No.Telp</label>
                                    <input type="text" class="form-control" id="inputNotelp" name="notelp">
                                </div>
                                <div class="mb-2">
                                    <label for="inputPassword">Password</label>
                                    <input type="text" class="form-control" id="inputPassword" name="password">
                                </div>
                                <div class="mb-2">
                                    <label for="inputJabatan">Jabatan</label>
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="jabatan">
                                        <option selected>Pilih Jabatan</option>
                                        <option id="owner" name="jabatan" value="owner">Owner</option>
                                        <option id="admin" name="jabatan" value="admin">Admin</option>
                                    </select>
                                    <!-- <input type="text" class="form-control" id="inputJabatan" name="jabatan"> -->
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-success" type="submit" name="submit">Update</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
            </form>

            <!-- PARTIAL KERANGKA FOOTER -->
            <?= include('./partials/foo.php') ?>
        </div>
    </body>

    </html>

<?php } else {
    header("Location: admin.php");
} ?>