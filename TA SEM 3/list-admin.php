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
                    <h1 class="mt-4">Daftar Admin</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">See Our Admin Here !</li>
                    </ol>
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
                                        <th>Nama</th>
                                        <th>No. Telpon</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>No. Telpon</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    include "koneksi.php";

                                    $nomer = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM admin_list WHERE role = 'admin'");
                                    while ($data = mysqli_fetch_array($query)) :
                                        $noid = $data['id'];
                                    ?>
                                        <tr>
                                            <td><?= $nomer++ ?></td>
                                            <td hidden><?= $noid ?></td>
                                            <td><?= $data['foto_karyawan'] ?></td>
                                            <td><?= $data['nama_karyawan'] ?></td>
                                            <td><?= $data['notelp_karyawan'] ?></td>
                                            <td><?= $data['username_karyawan'] ?></td>
                                            <td><?= $data['password_karyawan'] ?></td>
                                            <td>
                                                <a href="">
                                                    <button class="btn btn-outline-success" type="button">
                                                        <!-- <a href="/route/delete.php"> -->
                                                        <i class="fas fa-address-card"></i>
                                                        <!-- </a> -->
                                                    </button>
                                                </a>
                                                <a href="delete.php?id=<?= $noid ?>" onclick="return confirm('Delete This User?')">
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