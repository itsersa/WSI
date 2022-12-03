<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="wrapper">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
            <form action="route/admin-login.php" method="post" class="navbar-form">
                <center>
                    <h2>Silahkan Login !</h2>
                </center>
                <div class="navbar">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="username" aria-label="Username" aria-describedby="basic-addon1" name="username">
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" class="form-control" placeholder="password" aria-label="Password" aria-describedby="basic-addon1" name="password">
                </div>
                <div class="navbar">
                    <button type="submit" class="btn btn-outline-dark" style="width: 100%;">login</button>
                </div>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET['error'] ?>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
    </div>
</body>

</html>