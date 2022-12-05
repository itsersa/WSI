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
                        <li class="breadcrumb-item active">See User Here !</li>
                    </ol>
                    <div class="row">

                    </div>
                </div>
            </main>
        </div>

        <!-- PARTIAL KERANGKA FOOTER -->
        <?= include('./partials/foo.php') ?>
    </body>

<?php } else {
    header("Location: admin.php");
} ?>