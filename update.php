<?php

session_start();

require("db_config.php"); 
                     
$file = $_FILES["photo_name"];

$photo_name = basename($file['name']);

$dir = "./img/";

move_uploaded_file($_FILES['photo_name']['tmp_name'], $dir . $photo_name);

$sql = 'UPDATE PRODUCTS SET title = "'.$_POST['titlu'].'", description = "'.$_POST['descriere'].'", price = "'.$_POST['pret'].'", photo_name = "'.$photo_name.'" WHERE id= "'.$_POST['id'].'"';

$res = mysqli_query($conn, $sql);

mysqli_close($conn);

header('location: admin.php');

exit();

?>