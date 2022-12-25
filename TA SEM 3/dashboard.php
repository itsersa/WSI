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
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Line Chart Example
                                </div>
                                <div class="card-body">
                                    <canvas id="lineChart" width="100%" height="40"></canvas>

                                </div>
                                <script>

                                </script>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <?php
                            include "koneksi.php";

                            $label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                            for ($bulan = 1; $bulan < 13; $bulan++) {
                                $sql = "SELECT COUNT(ipaddress) as pelacak, waktu_visit as bulan FROM visitor WHERE month(waktu_visit)='$bulan'";
                                $query = mysqli_query($koneksi, $sql);
                                // print_r($sql);
                                $row = $query->fetch_array();
                                $jumlah_produk[] = $row['pelacak'];
                            }
                            // setting timer
                            $lama = date("Y"); // lama data setahun

                            // proses penghapusan data
                            $sql2 = "DELETE FROM visitor WHERE year(waktu_visit) < $lama";
                            $hasil = mysqli_query($koneksi, $sql2);
                            ?>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-line me-1"></i>
                                    Line Chart Example
                                </div>
                                <div class="card-body">
                                    <canvas id="graphCanvas" width="100%" height="40"></canvas>
                                </div>
                                <script>
                                    var ctx = document.getElementById("graphCanvas").getContext('2d');
                                    var graphCanvas = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: <?php echo json_encode($label); ?>,
                                            datasets: [{
                                                label: 'Grafik Pengunjung Setiap Bulan',
                                                data: <?php echo json_encode($jumlah_produk); ?>,
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255,99,132,1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },

                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>

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