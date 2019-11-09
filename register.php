<?php
    require_once 'header.php';
    require_once 'function.php';
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
if(isset($_POST['username']) && isset($_POST['password'])):
    {
        $success=false;
        $username =$_POST['username'];
        $password =$_POST['password'];
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $email =$_POST['email'];
        $_username = finUserByEmail($username);
        $user=finUserByEmail($email);
        if(!$user)
        {
            $code = generateRandomString(16);

            $stmt =$db->prepare("INSERT INTO user (name,password,status,code,email) VALUES(?,?,?,?,?)");
            $stmt->execute(array($username,$hash,0,$code,$email));
            $newUserid = $db->lastInsertId();
            sendEmail($email,$username,'kich hoat tai khoan',$code,"ma kich hoat : $code");
           // $_SESSION['UserID']=$newUserid;
           $success=true;
        }
    ?>
    <?php if($success ==false) : ?>
        <div style=" visibility: <?php echo $success==false ? 'visible':'hidden' ?>;"  role="alert">
            <h5 style="color : red;">email da ton tai</h2>
        </div>

    <?php else : ?>
        <div class="alert alert-success"  role="alert">
            <h5 style="color : blue;">Vui long kiem tra email de kich hoat tai khoan</h2>
        </div>
    <?php endif; ?> 
    <?php }; ?>
    <?php else : ?>

<form  action="register.php" method="POST">
<div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="User Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div  class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary">Register</button>
</form>
<?php endif; ?> 