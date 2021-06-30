<?php

require("db_config.php");
require("helper_methods.php");

$file = $_FILES["photo_name"];

$photo_name = basename($file['name']);

$dir = "./img/";

move_uploaded_file($_FILES['photo_name']['tmp_name'], $dir . $photo_name);

$sql = 'INSERT INTO PRODUCTS (title, description, price, photo_name) VALUES("' . $_POST["titlu"] . '", "' . $_POST["descriere"] . '", "' . $_POST["pret"] . '", "' . $photo_name . '")';

$res = mysqli_query($conn, $sql);

mysqli_close($conn);

?>