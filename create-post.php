<?php
    require_once 'init.php';
    if(!$currenUser)
    {
        header('Location: index.php');
        exit();
    }
?>