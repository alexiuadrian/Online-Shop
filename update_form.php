
<?php

session_start();

require("db_config.php");

$sql = 'SELECT * FROM PRODUCTS WHERE id='.$_GET["id"];

$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($res);

if (!$res) {
    die("Nu am putut efectua query-ul.");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class="card" style="margin-left: 30%; margin-right:30%; margin-top:10%;">
<div class="card-body" >
<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
  <div class="mb-3">
    <label for="titlu" class="form-label">Titlu</label>
    <input type="text" class="form-control" name="titlu" value="<?=$row["title"]?>" >
  </div>
  <div class="mb-3">
    <label for="descriere" class="form-label">Descriere</label>
    <input type="textarea" class="form-control" name="descriere" value="<?=$row["description"]?>">
  </div>
  <div class="mb-3">
    <label for="pret" class="form-label">Preț</label>
    <input type="text" class="form-control" name="pret" value="<?=$row["price"]?>">
  </div>
  <button class="btn btn-success" type="submit">Modifică</button>
</form>
<br>
    <a href="admin.php" class="btn btn-primary">Înapoi</a>
</div>
</div>
</body>
</html>