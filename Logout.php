<?php
    ob_start();

    session_start();

    $_SESSION = array();

    session_destroy();

    echo "<script>sessionstorage.clear();</script>";

    header("location: ../Index.php");

    exit;
?>