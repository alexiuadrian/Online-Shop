<?php

function validate_input_text($textValue) {
    if(!empty($textValue)) {
        $trim_text = trim($textValue);
        $clean_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
        
        return $clean_str;
    }
    return "";
}

function validate_input_email($emailValue) {
    if(!empty($emailValue)) {
        $trim_email = trim($emailValue);
        $clean_str = filter_var($trim_email, FILTER_SANITIZE_EMAIL);
        
        return $clean_str;
    }
    return "";
}

function upload_profile($file) {
    $dir = "./img/";
    
    $file_name = basename($file['name']);

    $final_path = $dir . $file_name;

    $file_type = pathinfo($final_path, PATHINFO_EXTENSION);

    if(!empty($file_name)) {
        $allow_type = array('jpg', 'png', 'jpeg');

        if(in_array($file_type, $allow_type)) {
            if(move_uploaded_file($file['temp_name'], $final_path)) {
                return $final_path;
            }
        }
    }
}