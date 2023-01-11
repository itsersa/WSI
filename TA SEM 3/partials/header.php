<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>header</title>
   <link rel="stylesheet" href="style/header.css?=<php? echo time(); ?">
   <script src="https://kit.fontawesome.com/3dba02c49c.js" crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/cb08e330cf.js"></script>
</head>

<body>
   <header class="header">

      <section class="flex">

         <a href="index.php" class="logo"><img src="img/Melody.png" alt=""></a>

         <nav class="navbar">
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
               <i class="fas fa-bars"></i>
            </label>
            <ul>
               <li class="items"><a style="text-decoration:none" href="index.php">Home</a></li>
               <li class="items"><a style="text-decoration:none" href="about.php">About</a></li>
               <li class="items"><a style="text-decoration:none" href="konsultasi.php">Konsultasi</a></li>
               <li class="items"><a style="text-decoration:none" href="contact.php">Contact</a></li>
            </ul>
         </nav>

      </section>

   </header>
</body>

</html>