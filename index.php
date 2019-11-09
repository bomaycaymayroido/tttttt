<?php
require_once 'header.php';
require_once 'home.php';
require_once 'init.php';
$posts=getNewfeeds();

?>
<?php
if ($currenUser) :
?>
<div >


  <form  action="create-post.php" method="POST">
  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
 
  <button style="margin-bottom: 50px" type="submit" class="btn btn-primary">UP</button>
</form>
</div>
<hr style="border-top: 2px solid #8c8b8b;">
<?php
  foreach ($posts as $post) : ?>
    <div class="col-sm-6" >
      <div class="card">
        <img style="width: 100px;" class="card-img-top" src="avatas/<?php echo $post['id']; ?>.jpg" alt="Card image cap">
        <div class="card-body">
          <!-- <h5 class="card-title"> <?php echo $post['name']; ?></h5> -->
          <h6 class="card-subtitle mb-2 text-muted"><?php echo $post['createAt']?></h6>
          <p class="card-text"><?php echo $post['content']; ?></p>
        </div>
      </div>
    </div>

  <?php endforeach ?>
<?php else : ?>
<?php endif; ?>
