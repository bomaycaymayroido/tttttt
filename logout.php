<?php
    require_once 'init.php';
    unset($_SESSION['UserID']);
    header('Location: login.php');
?>