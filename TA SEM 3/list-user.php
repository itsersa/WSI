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
                    <h1 class="mt-4">Daftar User</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">See Our User Here !</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable User
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>Noid</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>Noid</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    include "koneksi.php";

                                    $nomer = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM user_register");
                                    while ($data = mysqli_fetch_array($query)) :
                                        $noid = $data['id'];
                                    ?>
                                        <tr>
                                            <td><?= $nomer++ ?></td>
                                            <td hidden><?= $noid ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td><?= $data['password'] ?></td>
                                            <td>
                                                <a href="">
                                                    <button class="btn btn-outline-success" type="button">
                                                        <i class="fas fa-address-card"></i>
                                                    </button>
                                                </a>
                                                <a href="delete.php?id=<?= $noid ?>">
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

<?php } else {
    header("Location: admin.php");
} ?>