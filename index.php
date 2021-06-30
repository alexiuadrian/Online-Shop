<?php

session_start();

require("db_config.php");

$sql = "SELECT * FROM PRODUCTS ORDER BY id";

$res = mysqli_query($conn, $sql);

if (!$res) {
    die("Nu am putut efectua query-ul.");
}

$sql1 = "SELECT * FROM PRODUCTS WHERE id = (SELECT max(id) FROM PRODUCTS);";

$res1 = mysqli_query($conn, $sql1);

$row1 = mysqli_fetch_assoc($res1);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Shop Online</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Portfolio-with-Category-switcher.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <header class="header-blue">
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <div class="container-fluid"><a class="navbar-brand" href="/">MagazinulTauDeHaine</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/">Produse</a></li>
                    </ul>
                    <form class="d-flex me-auto navbar-form" target="_self">
                        
                    </form>
                    <?php
                        if(!isset($_SESSION["ID"])) {
                    ?>

                        <span class="navbar-text"> <a class="login" href="login.php">Log In</a></span><a class="btn btn-light action-button" role="button" href="register.php">Sign Up</a>
                    
                        <?php
                        }
                        else if($_SESSION["isAdmin"] == 1) {
                    ?>

                        <ul class="navbar-nav">
                            <a href="cart.php" style="margin-right: 10px; font-size: 1.5em; text-decoration: none;">🛒</a>
                            <li class="nav-item"><h6 class="nav-link">Bună, <?= $_SESSION["name"] ?>!</h6></li>
                            <li class="nav-item"><a class="btn btn-light action-button" role="button" href="admin.php">Admin</a></li>
                            <li class="nav-item"><a class="btn btn-light action-button" role="button" href="logout.php">Log Out</a></li>
                        </ul>

                    <?php
                        }
                        else {
                    ?>
                        <ul class="navbar-nav">
                            <a href="cart.php" style="margin-right: 10px; font-size: 1.5em; text-decoration: none;">🛒</a>
                            <li class="nav-item"><h6 class="nav-link">Bună, <?= $_SESSION["name"] ?>!</h6></li>
                            <li class="nav-item"><a class="btn btn-light action-button" role="button" href="logout.php">Log Out</a></li>
                        </ul>

                    <?php
                    
                        }
                    
                    ?>
                </div>
            </div>
        </nav>
        <div class="container hero">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                    <h1>Fii îndrăzneț. Încearcă ceva nou.</h1>
                    <p><?= $row1["title"] ?></p>
                    <p><?= $row1["price"] ?> RON</p><button class="btn btn-light btn-lg action-button" type="button" onclick="location.href = 'product.php?id=<?= $row1['id']?>'">Detalii</button>
                </div>
                <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                    <div class="phone-mockup"><img class="pulse animated" src="img/<?= $row1["photo_name"] ?>" style="width: 350px;height: 450px;box-shadow: 2px 2px 4px;"></div>
                </div>
            </div>
        </div>
    </header>

    <?php

        if (mysqli_num_rows($res) == 0) {
            print('<h1>Nu sunt produse disponibile momentan.</h1>');
        } 
        else
        {
            while ($row = mysqli_fetch_assoc($res)) {
    ?>

    <section data-aos="fade-up" style="margin-top: 50px;margin-bottom: 50px;margin-left: 10%;margin-right: 10%;">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="text-align: center;"><img src="img/<?= $row['photo_name'] ?>" style="width: 50%;height: 100%;box-shadow: 1px 1px 5px;"></div>
                <div class="col-md-6">
                    <h1><?= $row["title"] ?><br></h1>
                    <p style="padding-top: 10%;font-weight: bold;font-size: 24px;"><?= $row["price"] ?></p><button class="btn btn-primary" type="button" style="background: rgb(255,255,255);color: rgb(26,81,134);border-style: none;box-shadow: 1px 1px 4px rgb(0,0,0);" onclick="location.href = 'product.php?id=<?= $row['id'] ?>';">Detalii</button>
                </div>
            </div>
        </div>
    </section>

    <?php
            }
        }
    ?>
    
    <footer class="footer-basic">
        <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Home</a></li>
            <li class="list-inline-item"><a href="#">Services</a></li>
            <li class="list-inline-item"><a href="#">About</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
        </ul>
        <p class="copyright">MagazinulTauDeHaine © 2021</p>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/Portfolio-with-Category-switcher.js"></script>
</body>

</html>

<?php

mysqli_close($conn);

?>