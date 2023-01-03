<?php

include "catat_visitor.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Melody Store</title>
   <link rel="shortcut icon" type="image/x-icon" href="img/melody logo.png">


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <style>
      /* the slides */
      .slick-slide {
         margin: 0 10px;
      }
   </style>
   <link rel="stylesheet" href="style/index2.css">
   <link rel="stylesheet" type="text/css" href="style/slick.css">
   <link rel="stylesheet" type="text/css" href="style/slick-theme.css">


</head>

<body>


   <header class="header">
      <section class="flex">
         <a href="#home" class="logo"><img src="img/Melody.png" alt=""></a>
         <nav class="navbar">
            <a style="text-decoration:none" href="index2.php">Home</a>
            <a style="text-decoration:none" href="about.php">About</a>
            <a style="text-decoration:none" href="konsultasi.php">Konsultasi</a>
            <a style="text-decoration:none" href="contact.php">Contact</a>
         </nav>
         <div id="menu-btn" class="fas fa-bars"></div>
      </section>
   </header>


   <div class="home-bg">
      <section class="home" id="home">
         <div class="content">
            <h3>Healthy & Glowing Skin Start Here</h3>
            <p>Yuk kunjungi Melody Store dan cari tau jenis kulitmu dan produk yang cocok untukmu!</p>
            <a href="about.php" class="btn">about us</a>
         </div>
      </section>
   </div>


   <section class="about" id="about">

      <div class="image">
         <img src="img/konsultasi.jpg" alt="">
      </div>

      <div class="content">
         <h3>Yuk Konsultasikan Jenis Kulitmu!</h3>
         <p>Pakai skincare tapi tidak cocok? Yuk coba konsultasikan jenis kulitmu agar tidak salah memilih produk skincare yang cocok</p>
         <a href="konsultasi.php" class="btn">Konsultasi</a>
      </div>

   </section>


   <section class="Product">

      <div class="heading">
         <h3>our product</h3>
      </div>

      <div class="box-container">
         <?php

         include "koneksi.php";

         $query = mysqli_query($koneksi, "SELECT * FROM produk");
         while ($data = mysqli_fetch_array($query)) :
         ?>
            <div class="box">
               <img src="gambar/<?= $data['imageUtama'] ?>" alt="">
               <h3><?= $data['nama_produk']?></h3>
               <a href="#Ratu Arab" class="btn" style="height: 45px; width: 100px;">More</a>

            </div>
         <?php endwhile; ?>

      </div>

   </section>

   <section class="katalog" id="katalog">
      <div class="heading">
         <h3>Product Catalog</h3>
      </div>
      <?php

      include "koneksi.php";

      $query = mysqli_query($koneksi, "SELECT * FROM produk");
      while ($data = mysqli_fetch_array($query)) :
      ?>
         <div class="text-catalog" id="Ratu Arab">
            <h4 style="font-size: 3rem; color: #8a1f34; font-family: Merienda One;"><?= $data['nama_produk'] ?></h4>
         </div>
         <div class="product_container bg-grid logo-slider slick_two">
            <div class="container mt-3">
               <div class="row responsive">

                  <div class="col-lg-4">
                     <div class="card">
                        <img class="card-img-top" src="gambar/<?= $data['image'] ?>" alt="Card image" style="width:100%; height: 300px;">
                        <div class="card-body">
                           <h4 class="card-title" style="text-align: center;"><?= $data['nama_produk'] ?></h4>

                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="card">
                        <img class="card-img-top" src="gambar/<?= $data['image2'] ?>" alt="Card image" style="width:100%; height: 300px;">
                        <div class="card-body">
                           <h4 class="card-title" style="text-align: center;"><?= $data['nama_produk'] ?></h4>

                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="card">
                        <img class="card-img-top" src="gambar/<?= $data['image3'] ?>" alt="Card image" style="width:100%; height: 300px;">
                        <div class="card-body">
                           <h4 class="card-title" style="text-align: center;"><?= $data['nama_produk'] ?></h4>

                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="card">
                        <img class="card-img-top" src="gambar/<?= $data['image4'] ?>" alt="Card image" style="width:100%; height: 300px;">
                        <div class="card-body">
                           <h4 class="card-title" style="text-align: center;"><?= $data['nama_produk'] ?></h4>

                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="card">
                        <img class="card-img-top" src="gambar/<?= $data['image5'] ?>" alt="Card image" style="width:100%; height: 300px;">
                        <div class="card-body">
                           <h4 class="card-title" style="text-align: center;"><?= $data['nama_produk'] ?></h4>

                        </div>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      <?php endwhile; ?>
   </section>

   <section class="gallery" id="gallery">

      <div class="heading">
         <h3>our gallery</h3>
      </div>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img src="img/J1.png" class="d-block w-100" alt="gambar">
            </div>
            <div class="carousel-item">
               <img src="img/J2.png" class="d-block w-100" alt="gambar">
            </div>
            <div class="carousel-item">
               <img src="img/J3.png" class="d-block w-100" alt="gambar">
            </div>
            <div class="carousel-item">
               <img src="img/J4.png" class="d-block w-100" alt="gambar">
            </div>
            <div class="carousel-item">
               <img src="img/J5.png" class="d-block w-100" alt="gambar">
            </div>
            <div class="carousel-item">
               <img src="img/J6.png" class="d-block w-100" alt="gambar">
            </div>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
         </a>
      </div>
   </section>

   <?= include('./partials/footer.php') ?>

   <script src="js/script.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js" integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="script/slick.js"></script>
   <script src="script/slick.min.js"></script>
   <script>
      $('.responsive').slick({
         dots: true,
         infinite: true,
         speed: 300,
         slidesToShow: 3,
         slidesToScroll: 1,
         responsive: [{
               breakpoint: 1024,
               settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: true
               }
            },
            {
               breakpoint: 600,
               settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
               }
            },
            {
               breakpoint: 480,
               settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
               }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
         ]
      });
   </script>

</body>

</html>