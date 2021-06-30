console.log("Yes");

$(document).ready(function(e) {

    $("#register-form").submit(function (event) {
        let $password = $("#password");
        let $confirmPassword = $("#confirm-password");
        let $error = $("#error-text");

        if ($password.val() === $confirmPassword.val()) {
            return true;
        }
        else {
            $error.text("Eroare! Parolele nu coincid.");
            event.preventDefault();
        }
    });

});