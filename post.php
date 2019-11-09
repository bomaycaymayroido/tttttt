<?php
    require_once 'init.php';
?>

<?php
    $content = $_POST['content'];
    creatPost($currenUser['id'],$content);
?>
