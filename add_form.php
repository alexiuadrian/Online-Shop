
<?php

session_start();

?>

<?php 

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        require('add.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugă</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class="card" style="margin-left: 30%; margin-right:30%; margin-top:10%;">
<div class="card-body" >

<form id="add-form" action="add_form.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="titlu" class="form-label">Titlu</label>
    <input type="text" class="form-control" name="titlu" >
  </div>
  <div class="mb-3">
    <label for="descriere" class="form-label">Descriere</label>
    <input type="textarea" class="form-control" name="descriere">
  </div>
  <div class="mb-3">
    <label for="pret" class="form-label">Preț</label>
    <input type="text" class="form-control" name="pret">
  </div>
  <div class="mb-3">
    <label for="photo_name" class="form-label">Poză</label>
    <input type="file" form="add-form" class="form-control" name="photo_name">
  </div>
  
  <button class="btn btn-success" type="submit">Adaugă</button>
</form>
<br>
    <a href="admin.php" class="btn btn-primary">Înapoi</a>
</div>
</div>
</body>
</html>