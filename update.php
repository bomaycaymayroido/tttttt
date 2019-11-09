<?php
require_once 'header.php';
require_once 'init.php';
if(!$currenUser)
{
    header('Location: index.php');
    exit();
}
?>
<?php 
    if(isset($_POST['username'])):?>
    <?php
        $name = $_POST['username'];
        $success = false;
        if($name=='')
        {
            updateUserProfile($currenUser['id'],$name);
            $success=true;
        }
        if (isset($_FILES['avata']))
        {
            $success=false;
            $file=$_FILES['avata'];
            $fileName=$file['name'];
            $fileSize=$file['size'];
            $fileTemp=$file['tmp_name'];
            $filePath='./avatas/'.$currenUser['id'].'.jpg';
            $success=move_uploaded_file($fileTemp,$filePath);
            $newImage =resizeImage($filePath,480,480);
            imagejpeg($newImage,$filePath);
        }
    ?>
<?php endif ;?>
<?php
if (isset($success)) :
    {
        header('Location: index.php');
    ?>
    <?php }; ?>
<?php else : ?>
    <form method="POST">
        <div class="form-group">
            <label for="name">User Name</label>
            <input name="username" type="text" class="form-control" id="username"  placeholder="User Name">
        </div>
    
        <div class="form-group">

            <label for="avata">Avata</label>
            <input name="avata" type="file" class="form-control-file" id="avata">

        </div>
        <button type="submit" class="btn btn-primary" id="exampleFormControlFile1">OK</button>
    </form>
<?php endif; ?>

