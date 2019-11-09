
<?php
    require_once 'header.php';
    require_once 'init.php';
    require_once 'function.php';
?>
<?php
    if( isset($_GET['code'])):
    {
        $success=false;
        $code =$_GET['code'];
        
        $success = activateUser($code);
    ?>
    <?php if($success ==false) : ?>
        <div style=" visibility: <?php echo $success==false ? 'visible':'hidden' ?>;"  role="alert">
            <h5 style="color : red;">Kich hoat tai khoan that bai</h2>
        </div>

    <?php else : ?>
        <?php header('Location: login.php?loginsuccess');?>
    <?php endif; ?> 
    <?php }; ?>
    <?php else : ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form action="login.php" method="GET">
  <div  class="form-group">
    <label for="code">Mã Kích Hoạt</label>
    <input name="code" type="text" class="form-control" id="code" placeholder="Mã kích hoạt">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php endif; ?> 