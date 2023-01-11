<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melody Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="img/melody logo.png">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="style/contact.css">

</head>

<body>


    <header class="header">

        <section class="flex">

            <a href="#home" class="logo"><img src="img/Melody.png" alt=""></a>

            <nav class="navbar">
                <a style="text-decoration:none" href="index.php">Home</a>
                <a style="text-decoration:none" href="about.php">About</a>
                <a style="text-decoration:none" href="konsultasi.php">Konsultasi</a>
                <a style="text-decoration:none" href="#">Contact</a>
            </nav>

            <div id="menu-btn" class="fas fa-bars"></div>

        </section>

    </header>

    <div class="home-bg">

        <section class="home" id="home">

            <div class="content">
                <h3>Yuk Jadi Reseller Melody Store!</h3>
                <p>Jadi bagian Melody store dan dapatkan banyak keuntungan dengan menjadi reseller Melody Store</p>
            </div>

        </section>

    </div>


    <section class="about" id="about">

        <div class="image">
            <img src="img/keranjang.png" alt="">
        </div>

        <div class="content">
            <h3>Syarat Menjadi Reseller Melody Store</h3>
            <p>Mulai jadi bagian Melody Beauty Store dengan menjadi reseller. Caranya beli paket usaha dengan klik:</p>
            <a href="https://www.tiktok.com/@melodybeauty29" class="btn">Daftar Reseller</a>
        </div>

    </section>


    <section class="Product">

        <div class="heading">
            <h3>Product</h3>
        </div>

        <div class="box-container">
            <?php

            include "koneksi.php";

            $query = mysqli_query($koneksi, "SELECT * FROM produk");
            while ($data = mysqli_fetch_array($query)) :
            ?>
                <div class="box">
                    <img src="gambar/<?= $data['imageUtama'] ?>" alt="">
                    <h3><?= $data['nama_produk'] ?></h3>
                </div>
            <?php endwhile; ?>

        </div>

    </section>
    <section class="gallery" id="gallery">

        <div class="heading">
            <h3>Contact Us</h3>
        </div>
        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+62 81331600029</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Email</h5>
                            <h4 class="text-primary mb-0">melodybeauty@gmail.com</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Visit our Store</h5>
                            <h4 class="text-primary mb-0">Ruko Mastrip Square Blok C, Sumbersari, Jember</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?= include('./partials/footer.php') ?>

    <script src="js/script.js"></script>
</body>

</html>