
<?php
    require_once 'header.php';
    require_once 'init.php';
    require_once 'function.php';
?>
<?php
    if(isset($_POST['li_username']) && isset($_POST['li_password'])):
    {
        $success=false;
        $username =$_POST['li_username'];
        $password =$_POST['li_password'];
        
        $_username = finUserByEmail($username);
    
        if( $_username['status']==1 && $username &&password_verify($password,$_username['password']))
        {
          
            $_SESSION['UserID']=$_username['id'];
        
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

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form action="login.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="li_username" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div  class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="li_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php endif; ?> 