<?php

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </head>

    <body>
        <header class="p-3 text-bg-dark">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <span class="fs-4">Project Management System</span>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <!-- <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">About</a></li> -->
                    </ul>

                    <div class="text-end">
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                        <!-- <button type="button" class="btn btn-danger">Logout</button> -->
                    </div>
                </div>
            </div>
        </header>
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
            <!-- FOR ADMIN -->
            <?php if ($_SESSION['role'] == 'admin') { ?>
                <div class="card" style="width: 18rem;">
                    <img src="img/admin-logo.png" class="card-img-top" alt="admin logo">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $_SESSION['fullname'] ?></h5>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            <?php } ?>
            <!-- FOR OWNER -->
            <?php if ($_SESSION['role'] == 'owner') { ?>
                <div class="card" style="width: 18rem;">
                    <img src="img/owner.png" class="card-img-top" alt="admin logo">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $_SESSION['fullname'] ?></h5>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            <?php } ?>
            <!-- FOR PROGRAMMER -->
            <?php if ($_SESSION['role'] == 'programmer') { ?>
                <div class="card" style="width: 18rem;">
                    <img src="img/programmer.png" class="card-img-top" alt="admin logo">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $_SESSION['fullname'] ?></h5>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>

    </html>
<?php } else {
    header("Location: index.php");
} ?>