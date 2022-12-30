<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login and Sign Up form</title>
    <link rel="stylesheet" href="style/login.css">
    <!-- font Awesome Cdn Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/
    ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
        <form action="route/user-login.php" method="post">
            <h1>Login</h1>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_GET['error'] ?>
                </div>
            <?php } ?>
            <input type="text" placeholder="Username" name="username">
            <input type="password" placeholder="Password" name="password">
            <div class="recover">
                <a href="#">Forgot Password?</a>
            </div>
            <button name="submit">Login</button>
        </form>
        <div class="member">
            Not a member? <a href="./register.php">
                Register Now
            </a>
        </div>
    </div>
</body>

</html>