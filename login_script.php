<?php

require("helper_methods.php");

$error = array();

$email = validate_input_email($_POST['email']);

if(empty($email)) {
    $error[] = "Nu ați introdus email-ul.";
}

$password = validate_input_text($_POST['password']);

if(empty($password)) {
    $error[] = "Nu ați introdus parola.";
}

if(empty($error)) {

    $sql = "SELECT id, name, email, password, isAdmin FROM USERS WHERE email = ?";

    require("db_config.php");
    $q = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($q, $sql);
    mysqli_stmt_bind_param($q, 's', $email);

    mysqli_stmt_execute($q);

    $res = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

    if(!empty($row)) {
        if(password_verify($password, $row["password"])) {
            // Porneste sesiunea si populeaza
            session_start();
            
            $_SESSION["ID"] = $row["id"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["isAdmin"] = $row["isAdmin"];

            header("location: index.php");

            exit();
        }
        else {
            echo "Wrong password!";
        }
    }
}
else {
    print "Nu există niciun cont înregistrat pe această adresă. Vă rog să vă înregistrați.";
    echo "what";
}

?>