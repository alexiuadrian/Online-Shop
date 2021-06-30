<?php

session_start();

require("db_config.php");

$sum = 0;

if(isset($_SESSION["cart"])) {

    for($i = 0; $i < count($_SESSION["cart"]); $i++) {
        $sum += floatval($_SESSION["cart"][$i]["price"]);
    }

    $sum += 10;

    $sql = 'INSERT INTO ORDERS (name, email, total_price) VALUES("' . $_SESSION["name"] . '", "' . $_SESSION["email"] . '", "' . $sum . '")';

    $res = mysqli_query($conn, $sql);

    $sql1 = 'SELECT * FROM ORDERS WHERE id = (SELECT max(id) FROM ORDERS)';

    $res1 = mysqli_query($conn, $sql1);

    $row1 = mysqli_fetch_assoc($res1);

    for($i = 0; $i < count($_SESSION["cart"]); $i++) {
        for($j = 0; $j < $_SESSION["cart"][$i]["quantity"]; $j++) {
            $sql2 = 'INSERT INTO PRODUCTS_ORDERS (product_id, order_id) VALUES("' . $_SESSION["cart"][$i]["id"] . '", "' . $row1["id"] . '")';
            $res2 = mysqli_query($conn, $sql2);
        }
    }

    mysqli_close($conn);

    $_SESSION["cart"] = array();
}
else {
    header("location: index.php");

    exit();
}

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
                        else {
                    ?>
                        <ul class="navbar-nav">
                            <li class="nav-item"><h6 class="nav-link">Bună, <?= $_SESSION["name"] ?>!</h6></li>
                            <li class="nav-item"><a class="btn btn-light action-button" role="button" href="logout.php">Log Out</a></li>
                        </ul>

                    <?php
                    
                        }
                    
                    ?>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h1 class="text-center" style="color: rgb(7,234,2);margin-top: 25%;">Comanda dumneavoastră cu numărul #<?= $row1["id"] ?> a fost plasată cu succes!</h1>
                    <p style="text-align: center;color: rgb(255,255,255);margin-top: 50px;">Vă mulțumim că ați ales MagazinulTauDeHaine. Vă mai așteptăm!</p>
                    <button class="btn btn-primary" type="button" onclick="location.href = 'index.php'" style="background: rgba(13,110,253,0);border-style: none;box-shadow: 1px 1px 5px rgb(0,0,0);">Înapoi la produse</button>
                </div>
            </div>
        </div>
    </header>
    <footer class="footer-basic">
        <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Home</a></li>
            <li class="list-inline-item"><a href="#">Services</a></li>
            <li class="list-inline-item"><a href="#">About</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
        </ul>
        <p class="copyright">Company Name © 2021</p>
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