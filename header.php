
<?php
    require_once 'init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<header>
    <div class="header">
        <a href="#default" class="logo">Hello world</a>
        <div class="header-right">
            <a class="<?php echo $page=='home'?'active':''?>" href="home.php">Home</a>
            <?php if(!$currenUser):?>
            <?php { ?>
            <a class="<?php echo $page=='login'?'active':''?>" href="login.php">Login</a>
            <?php } ?>
            <?php endif;?>
            <a class="<?php echo $page=='register'?'active':''?>" href="register.php">Register</a>
            <?php if($currenUser):?>
            <?php { ?>
            <a href="logout.php">Logout<?php echo $currenUser ? '('. $currenUser['name'].')' :  '' ?></a>
            <a class="<?php echo $page=='login'?'active':''?>" href="change.php">Change<?php ?></a>
            <a class="<?php echo $page=='update'?'active':''?>" href="update.php">Update<?php ?></a>
            <?php } ?>
            <?php else: ?>
            <?php endif;?>
        </div>
    </div>
</header>

</html>