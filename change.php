<?php
require_once 'header.php';
require_once 'init.php';
?>
<?php
    if(isset($_POST['email']) && isset($_POST['password'])):
    {
        $success=false;
        $email =$_POST['email'];
        $password =$_POST['password'];
       
        $new =$_POST['new_password'];
        $hash = password_hash($new,PASSWORD_DEFAULT);
        $_username = finUserByEmail($email);
    
        if($_username &&password_verify($password,$_username['password']))
        {
            $_SESSION['UserID']=$_username['id'];
            $stmt =$db->prepare("UPDATE  user set password = ? where id =? ");
            $stmt->execute(array($hash,$currenUser['id']));
            $success=true;
        }
    ?>
    <?php if($success ==false) : ?>
        <div style=" visibility: <?php echo $success==false ? 'visible':'hidden' ?>;"  role="alert">
            <h5 style="color : red;">Tài khoản hoặc mật khẩu không chính xác</h2>
        </div>

    <?php else : ?>
        <?php header('Location: home.php?loginsuccess');?>
    <?php endif; ?> 
    <?php }; ?>
    <?php else : ?>
<form action="change.php" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1"> New Password</label>
        <input name="new_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password">
    </div>
    <button type="submit" class="btn btn-primary">Change</button>

</form>
<?php endif; ?> 