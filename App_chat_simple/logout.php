<?php
session_start();
// delete session
session_destroy();
// return index.php
header('Location: index.php');
?>