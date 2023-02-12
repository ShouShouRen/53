<?php
    session_start();
    extract($_GET);
    unset($_SESSION["AUTH"]);
    header("Location:index.php");
?>