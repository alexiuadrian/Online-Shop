<?php

session_start();

require("db_config.php");

$sql = "SELECT * FROM PRODUCTS ORDER BY id";

$res = mysqli_query($conn, $sql);

if (!$res) {
    die("Nu am putut efectua query-ul.");
}

?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<title>Admin</title>
</head>
<body>

    <a class="btn btn-primary" style="margin-top: 5%; margin-left: 68.5%" href="add_form.php" role="button">Adaugă</a>

<div class="card text-center" style="margin-left: 20%; margin-right: 20%; margin-top: 1%;">
<h5 class="card-header">Produse</h5>
  <div class="card-body">
        
        <table class="table table-borderless">
        <tr>
            <th>Titlu</th>
            <th>Preț</th>
            <th></th>
            <th></th>
        </tr>

        <?php

        if (mysqli_num_rows($res)==0) {
            print('<tr><td colspan="4">Nu sunt inregistrari in DB.</td></tr>');
        } 
        else
        {
            while ($row = mysqli_fetch_assoc($res)) {
        ?>

        <tr>
            <td><a href="product.php?id=<?=$row["id"]?>"><?=$row["title"]?></a></td>
            <td><?=$row["price"]?></td>
            <td><a href="delete_product.php?id=<?=$row["id"]?>" type="button" class ="btn btn-danger">Șterge</a></td>
            <td><a href="update_form.php?id=<?=$row["id"]?>" type="button" class="btn btn-success">Editează</a></td>
        </tr>

        <?php
            }
        }
        ?>

        </table>
        <a href="/" type="button" class="btn btn-primary">Înapoi la site</a>
  </div>
</div>

</body>
</html>

<?php

mysqli_close($conn);

?>
