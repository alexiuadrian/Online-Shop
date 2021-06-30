<?php

session_start();

if(isset($_SESSION["cart"])) {

    $session_array = array(
        'id' => $_GET["id"],
        'size' => $_GET["size"],
        'quantity' => $_GET["quantity"],
        'title' => $_GET["title"],
        'price' => $_GET["price"]
    );

    array_push($_SESSION["cart"][], $session_array);

    $_SESSION["cart"][count($_SESSION["cart"]) - 1] = $session_array;
}
else {
    $session_array = array(
        'id' => $_GET["id"],
        'size' => $_GET["size"],
        'quantity' => $_GET["quantity"],
        'title' => $_GET["title"],
        'price' => $_GET["price"]
    );

    $_SESSION["cart"][] = $session_array;
}

var_dump($_SESSION["cart"]);

header("location: product.php?id=".$_GET["id"]);

exit();
?>