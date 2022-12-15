<?php

session_start();

$id = ($_SESSION['id']);

if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <body class="sb-nav-fixed">
        <!-- PARTIAL KERANGKA DASHBOARD -->
        <?= include('./partials/rangka.php') ?>

        <div id="layoutSidenav_content">
            <main>
                <form action="setting.php" method="post" enctype="multipart/form-data">

                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Profile</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Profile Here !</li>
                        </ol>
                        <div class="row">
                            <?php
                            include "koneksi.php";

                            $query = "SELECT * FROM admin_list WHERE id = '$id'";
                            $result = mysqli_query($koneksi, $query);
                            $data = mysqli_fetch_array($result);

                            // echo "<pre>";
                            // print_r($data);
                            ?>
                            <div class="col-xl-3 col-md-1">
                                <div class="card" style="width: 180px;">
                                    <img style="width: 180px" ; src="gambar/<?= $data['foto_karyawan'] ?>" class="card-img-top" alt="admin logo">
                                </div>
                            </div>

                            <!-- MENAMPILKAN SESSION DATA ADMIN -->
                            <div class="form-group col-md-3">
                                <div>
                                    <label for="inputNama">Nama :</label>
                                    <input type="text" class="form-control" id="inputNama" value="<?= $data['nama_karyawan'] ?>" readonly>
                                </div>
                                <div>
                                    <label for="inputUsername">Username :</label>
                                    <input type="text" class="form-control" name="username" id="inputUsername" value="<?= $data['username_karyawan'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="inputPicture">Picture :</label>
                                    <input type="file" class="form-control" id="inputPicture" name="gambarAdmin">
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-success" name="submit" type="submit" onclick="return confirm('Refresh setelah ubah data')">Update</button>
                                </div>
                            </div>

                            <!-- MENAMPILKAN SESSION DATA ADMIN -->
                            <div class="form-group col-md-3">
                                <div>
                                    <label for="inputNotelp">No.Telp</label>
                                    <input type="text" class="form-control" name="notelp" id="inputNotelp" value="<?= $data['notelp_karyawan'] ?>">
                                </div>
                                <div>
                                    <label for="inputPassword">Password</label>
                                    <input type="text" class="form-control" name="password" id="inputPassword" value="<?= $data['password_karyawan'] ?>">
                                </div>
                                <div>
                                    <label for="inputJabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="inputJabatan" value="<?= $data['role'] ?>" readonly>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    // FORM
                    $username = $_POST['username'];
                    $notelp = $_POST['notelp'];
                    $password = $_POST['password'];

                    // IMAGE
                    $img_name = $_FILES['gambarAdmin']['name'];
                    $img_size = $_FILES['gambarAdmin']['size'];
                    $tmp_name = $_FILES['gambarAdmin']['tmp_name'];
                    $error = $_FILES['gambarAdmin']['error'];
                    echo "<pre>";
                    if ($error === 0) {
                        if ($img_size > 1250000) {
                            $txt = "File Terlalu Besar!";
                            // header("Location: ../add-admin.php?error=$txt");
                        } else {
                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                            $img_ex_lc = strtolower($img_ex);

                            $allowed_exs = array("jpg", "jpeg", "png");

                            if (in_array($img_ex_lc, $allowed_exs)) {
                                $new_image_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                $img_upload_path = 'gambar/' . $new_image_name;
                                move_uploaded_file($tmp_name, $img_upload_path);

                                $query = "UPDATE admin_list SET foto_karyawan = '$new_image_name', notelp_karyawan = '$notelp', username_karyawan = '$username', password_karyawan = '$password' WHERE id = '$id'";
                                print_r($query);

                                $result = mysqli_query($koneksi, $query);
                                if ($result == true) {
                                    $txt = "Berhasil Menambah Admin!";
                                    // header("Location: ../add-admin.php?success=$txt");
                                }
                            } else {
                                $txt = "Format Tidak Didukung";
                                // header("Location: setting.php?error=$txt");
                            }
                        }
                    } else {
                        $query = "UPDATE admin_list SET notelp_karyawan = '$notelp', username_karyawan = '$username', password_karyawan = '$password' WHERE id = '$id'";
                        // print_r($query);

                        $result = mysqli_query($koneksi, $query);
                        if ($result == true) {
                            $txt = "Berhasil Menambah Admin!";
                            header("Location: ../add-admin.php?success=$txt");
                        }
                    }
                    echo "<meta http-equiv='refresh' content='1; url=http://localhost/wsi/WSI/TA%20SEM%203/setting.php?id={$id}'>";
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