<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 5/21/2019
 * Time: 2:48 PM
 */
    // connect database
    include('includes/general.php');
    if ($user)
    {
        header('Location: index.php'); // Di chuyển đến file index.php
    }

    $username = @mysqli_real_escape_string($cn, $_POST['username']);
    $password = @mysqli_real_escape_string($cn, $_POST['password']);


    // show notice

    $show_alert = '<script>$("#formJoin .alert").show();</script>'; // show notice
    $hide_alert = '<script>$("#formJoin .alert").hide();</script>'; // hide notice
    $success_alert = '<script>$("#formJoin .alert").attr("class", "alert success");</script>'; // success

    // check username in database

    $query_check_exist_user = mysqli_query($cn, "SELECT * FROM users WHERE username = '$username'");

// if data input is empty
    if ($username == '' || $password == '') {
        echo $show_alert . 'Input data is empty';
    }
    else {
        // exist username and pass => login
        if (mysqli_num_rows($query_check_exist_user)) {
            $password = md5($password); // password to MD5 code
            // check user login
            $query_check_login = mysqli_query($cn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
            // if true
            if (mysqli_num_rows($query_check_login)) {
                echo $show_alert . $success_alert . 'Login success.';
                $_SESSION['username'] = $username; // save username session
                echo '<script>window.location.reload();</script>'; // reload page
            }
            else {
                echo $show_alert . 'Username or Password false !.';
            }
        }
        // register
        else {
            //if username length < 6 or > 40
            if (strlen($username) < 6 || strlen($username) > 40) {
                echo $show_alert . '6 < username length < 40';
            }
            // if username contain space or special character
            else if (preg_match('/\W/', $username)) {
                echo $show_alert . 'username contain space or special character.';
            }
            // if password length < 6
            else if (strlen($password) < 6) {
                echo $show_alert . 'password is too short. ';
            }
            else {
                $password = md5($password); // password to MD5 code
                // insert user to database
                $query_create_user = mysqli_query($cn, "INSERT INTO users VALUES (
                            '',
                            '$username',
                            '$password',
                            '$date_current'
                        )");
                echo $show_alert . $success_alert . 'Register success. ';
                $_SESSION['username'] = $username; // Save username session
                echo '<script>window.location.reload();</script>'; // reload page
            }
        }
    }

?>