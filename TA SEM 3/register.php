<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login and Sign Up form</title>
    <link rel="stylesheet" href="style/register.css">
    <!-- font Awesome Cdn Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/
    ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script> -->
</head>

<body>
    <div class="wrapper">
        <form action="route/user-register.php" method="post">
            <h1>Register</h1>
            <!-- MENAMPILKAN ALERT -->
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_GET['error'] ?>
                </div>
            <?php } ?>
            <input type="text" placeholder="Username" name="username" required>
            <input type="text" placeholder="Name" name="fullname" required>
            <input type="password" placeholder="Password" name="password" required>
            <input type="password" placeholder="Re-Enter Password" name="password-valid" required>
            <div class="terms">
                <input type="checkbox" id="checkbox">
                <label for="checkbox">I agree to these <a href="#">terms & Conditions</a></label>
            </div>
            <button name="submit">Register</button>
        </form>
        <div class="member">
            Already a member? <a href="./login.php">
                Login Here
            </a>
        </div>
    </div>
</body>

</html>