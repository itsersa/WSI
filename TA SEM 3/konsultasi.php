<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi</title>
    <link rel="stylesheet" href="style/konsul.css?=<php? echo time(); ?>">
    <link rel="stylesheet" href="konsul.css?=<php? echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/3dba02c49c.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cb08e330cf.js"></script>
    <script src="https://kit.fontawesome.com/3dba02c49c.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cb08e330cf.js" ></script>
</head>
<body>
<?= include ('./partials/header.php') ?>
    <div class="section">
        <div class="container">
            <div class="content-section">
                <div class="title">
                    <h1>Yuk Konsultasikan Jenis Kulitmu !</h1>
                </div>
                <div class="content">
                    <p> Pakai skincare tapi tidak cocok? Yuk coba konsultasikan jenis kulitmu agar tidak salah memilih produk skincare yang cocok</p>
                    <div class="button">
						<a href="https://api.whatsapp.com/send?phone=6281331600029">Konsultasi</a>
					</div>
                </div>
            </div>
            <div class="image-section">
                <img src="img/konsultasi.jpg">
            </div>
        </div>
    </div>

    <section class="konsul" id="konsul">
        <div class="container-fluid">
            <div class="row">
                <div class="card-deck">
                    <div class="card" style="text-align: center; margin-left: 20px; margin-right: 20px; width: 100%;">
                        <img src="img/Konsul online.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Konsultasi Online</h3>
                            <p class="card-text" style="font-size: 14px; text-align: left;">Bingung menentukan produk kosmetik yang sesuai? Dapatkan layanan konsultasi Online untuk menentukan produk yang sesuai dengan jenis kulit Anda. Lakukan mudah dengan hanya sekali klik:<br>
                                <br>1. Konsultasi online dapat dilakukan sebelum pembelian produk.
                                <br>2. Dapat melalui chat WhatsApp dengan admin.
                                <br>3. Tanpa minimal pembelian.
                                <br>

                            </p>
                            <a href="#" class="btn">Konsultasi Online</a>
                        </div>
                    </div>
                    <div class="card" style="text-align: center;  margin-left: 20px; margin-right: 20px width: 100%;">
                        <img src="img/Konsul Langsung.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Konsultasi Langsung</h3>
                            <p class="card-text" style="font-size: 14px; text-align: left;">Konsultasi langsung akan memudahkan Anda mengetahui jenis kulit dengan lebih akurat dan lebih mudah menentukan jenis produk yang sesuai dengan jenis kulit Anda. Lakukan reservasi konsultasi langsung dengan cara:<br>
                                <br>1. Kunjungi Melody Beauty Store
                                <br>2. konsultasi dan cek jenis kulit gratis dengan minimal pembelian Rp.300.000,-
                                <br>3. Jika ingin melakukan konsultasi dan cek jenis kulit tanpa minimal pembelian, maka pilih layanan berbayar senilai Rp.50.000,-
                            </p>
                            <a href="#" class="btn">Konsultasi Langsung</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?= include('./partials/footer.php') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js" integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
