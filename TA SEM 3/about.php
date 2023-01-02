<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About us</title>
  <link rel="stylesheet" href="style/about.css?=<php? echo time(); ?>">
  <script src="https://kit.fontawesome.com/3dba02c49c.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/cb08e330cf.js"></script>
</head>

<body>
  <?php include './partials/header.php'; ?>
  <div class="section">
    <div class="container">
      <div class="content-section">
        <div class="title">
          <h1>About Us</h1>
        </div>
        <div class="content">
          <h3>Seklias tentang Melody Beauty</h3>
          <p>Melody Beauty merupakan toko kosmetik yang menjual berbagai macam produk kecantikan.
            Bukan hanya menjual produk kecantikan saja, toko kosmetik melodi juga membuka konsultasi bagi para customer yang ingin mengetahui bagaimana kondisi muka mereka dan produk seperti apa yang mereka butuhkan, dan jangan khawatir karena
            pastinya melodi menawarkan produk serta treatment terbaik untuk para konsumen yang datang ke toko.
          </p>
          <div class="button">
            <a href="https://shopee.co.id/agenkosmetik_khusnul">Belanja di sini!</a>
          </div>
        </div>
      </div>
      <div class="image-section">
        <img src="img/melobanner (1).png">
      </div>
    </div>
  </div>

  <div class="container1">
    <h2>Melody Beauty Location</h2>
    <center>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.3509817971963!2d113.72291221425509!3d-8.16734969412141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b2b9892feb%3A0x2438e3891da45d78!2sMelody%20Beauty!5e0!3m2!1sen!2sid!4v1670245874752!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </center>
  </div>

  <div class="testimonials">
    <div class="inner">
      <h3>REVIEWS</h3>
      <div class="border"></div>

      <div class="row">
        <div class="col">
          <div class="testimonial">
            <a href="https://shopee.co.id/buyer/8619270/rating"><img src="img/noprofile.png" alt=""></a>
            <div class="name">oktria123</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>

            <p>
              Barang sudah datang dengan selamat dan dapat bonus totebag. Lain kali order sini lagi deh, siapa tau dapat bonus yang lebih menarik lagi. Terima kasih.
            </p>
          </div>
        </div>

        <div class="col">
          <div class="testimonial">
            <a href="https://shopee.co.id/buyer/8619270/rating"><img src="img/noprofile.png" alt=""></a>
            <div class="name">dwmei_a</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>

            <p>
              Tekstur oke, performa bagus, cocok untuk semua jenis kulit. Makasih seller semoga produknya ori ada scan barcokdenya muncul semoga beneran ori. Next order lagi
            </p>
          </div>
        </div>

        <div class="col">
          <div class="testimonial">
            <a href="https://shopee.co.id/buyer/8619270/rating"><img src="img/noprofile.png" alt=""></a>
            <div class="name">dellaartha17</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>

            <p>
              Efektivitas efektiv banget, kualitas bagus, harga terjangkau. Pengiriman cepat, packing rapi, harga terjangkau.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?= include('./partials/footer.php') ?>

</body>

</html>