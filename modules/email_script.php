<?php

function spamcheck($field) {
    //filter_var() sanitizes the e-mail
    //address using FILTER_SANITIZE_EMAIL
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);

    //filter_var() validates the e-mail
    //address using FILTER_VALIDATE_EMAIL
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

if (isset($_REQUEST['email'])) {//if "email" is filled out, proceed
    //check if the email address is invalid
    $mailcheck = spamcheck($_REQUEST['email']);
    if ($mailcheck == FALSE) {
        echo '<center><p style="color:red; font-size: 20px;">Invalid email!</p><center>';
    } else {//send email
        $email = $_REQUEST['email'];
        $subject = $_REQUEST['subject'];
        $message = $_REQUEST['message'];
        $receiver = "info@reflexconcepts.co.ke";
        mail($receiver, "Subject: $subject", $message, "From: $email");
        //echo '<center style="color: #009933">Thank you for contacting us. We will get back to you as soon as possible.</center>';
        echo "<script>

                        alert('Thank you for contacting us. We will get back to you as soon as possible!');

                </script>";
    }
}
?>