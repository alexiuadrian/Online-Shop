<?php

require('helper_methods.php');
$error = array();

$name = validate_input_text($_POST['name']);

if(empty($name)) {
    $error[] = "Nu ați introdus numele.";
}

$email = validate_input_email($_POST['email']);

if(empty($email)) {
    $error[] = "Nu ați introdus email-ul.";
}

$password = validate_input_text($_POST['password']);

if(empty($password)) {
    $error[] = "Nu ați introdus parola.";
}

$confirm_password = validate_input_text($_POST['confirm_password']);

if(empty($confirm_password)) {
    $error[] = "Nu ați confirmat parola.";
}

if(empty($error)) {
    // Hash-uim parola
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    require('db_config.php');

    $sql = "INSERT INTO USERS (name, email, password) VALUES (?, ?, ?)";

    $q = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($q, $sql);

    mysqli_stmt_bind_param($q, 'sss', $name, $email, $hashed_password);

    mysqli_stmt_execute($q);

    if(mysqli_stmt_affected_rows($q) == 1) {
        print "Tabelul a fost actualizat.";
    }
    else {
        print "Eroare la actualizarea tabelului.";
    }
}

header("location: index.php");

exit;
?>