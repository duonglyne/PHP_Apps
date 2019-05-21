<?php
    $namehost = 'localhost';
    $userhost = 'root';
    $passhost = '';
    $database = 'appchat';

    // connect to database
    $cn = mysqli_connect($namehost, $userhost, $passhost, $database);
    // if connect false
    if (!$cn) {
        echo 'Could not connect to database';
    }
    
?>
