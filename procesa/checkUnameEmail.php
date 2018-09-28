<?php
    $registeredEmail = 
    array('ivan.belmont@hotmail.com', 'jenson2@jenson.in', 'jenson3@jenson.in', 'jenson4@jenson.in', 'jenson5@jenson.in');

    $requestedEmail  = $_POST['correo'];

    if( in_array($requestedEmail, $registeredEmail) ){
        echo 'false';
    }
    else{
        echo 'true';
    }
    ?>