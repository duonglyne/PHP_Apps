<?php
    // connect to file connectdb.php
    include('connectdb.php');
    // set default time
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date_current = '';
    $date_current = date("Y-m-d H:i:sa");

    // start save session
    session_start();
    // If session exist
    if (@$_SESSION['username']) {
        //  $user = session
        $user = $_SESSION['username'];
    }
    else {
        // $user is empty
        $user = '';
    }
?>