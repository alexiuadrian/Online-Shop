<?php

require("db_config.php");

$id = mysqli_real_escape_string($conn, $_GET["id"]);

$sql = "DELETE FROM PRODUCTS WHERE id='".$id."'";

$res = mysqli_query($conn, $sql);

mysqli_close($conn);

header('location: admin.php');

exit();

?>