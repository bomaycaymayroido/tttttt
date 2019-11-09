<?php
    require_once 'function.php';
    require_once './vendor/autoload.php';
    require_once 'config.php';

    session_start();
    $uri =$_SERVER['REQUEST_URI'];
    $PARTS=explode('/',$uri);
    $fileName =$PARTS[2];
    $PARTS=explode('.',$fileName);
    $page =$PARTS[0];
    $db=new PDO('mysql:host=localhost;dbname=login;charset=utf8', 'root', '');
    $currenUser=null;
    if(isset($_SESSION['UserID']))
    {     
       $currenUser = finUserById($_SESSION['UserID']);    
    }
    $db=new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    function getNewfeeds()
    {
        global $db;
        $stmt =  $db->query("SELECT * FROM post");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

?>