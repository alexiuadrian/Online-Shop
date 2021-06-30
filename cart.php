<?php

session_start();

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
    <header class="header-blue" style="padding-bottom: 0px;">
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <div class="container-fluid"><a class="navbar-brand" href="index.php">MagazinulTauDeHaine</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.php">Produse</a></li>
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
    </header><div class="shopping-cart">
<div class="px-4 px-lg-0">

  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Produs</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Preț</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Cantitate</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Șterge</div>
                  </th>
                </tr>
              </thead>
              <tbody>
              <?php
                $sum = 0;

                if(isset($_SESSION["cart"])) {

                  for($i = 0; $i < count($_SESSION["cart"]); $i++) {
                      $sum += floatval($_SESSION["cart"][$i]["price"]) * $_SESSION["cart"][$i]["quantity"];
              ?>
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="product.php?id=<?= $_SESSION["cart"][$i]["id"] ?>" class="text-dark d-inline-block align-middle"><?= $_SESSION["cart"][$i]["title"] ?></a></h5>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong><?= $_SESSION["cart"][$i]["price"] * $_SESSION["cart"][$i]["quantity"] ?></strong></td>
                  <td class="border-0 align-middle"><strong><?= $_SESSION["cart"][$i]["quantity"] ?></strong></td>
                  <td class="border-0 align-middle"><a href="delete_from_cart.php?id=<?= $i ?>" class="text-dark"><i class="fa fa-trash"></i></a></td>
                </tr>

              <?php

                  }
                }
              ?>

              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>

      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Rezumat comandă</div>
          <div class="p-4">
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Subtotal comandă</strong><strong><?= $sum ?> RON</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Cost transport</strong><strong><?php if ($sum == 0) echo 0; else echo 10; ?> RON</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold"><?php if($sum == 0) echo 0; else echo $sum + 10; ?> RON</h5>
              </li>
            </ul><a href="confirmation.php?" class="btn btn-dark rounded-pill py-2 btn-block">Plasează comanda</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</div>
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