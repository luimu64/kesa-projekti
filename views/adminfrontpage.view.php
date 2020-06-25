<?php
require "public/partials/adminheader.php";
?>

<div class="bg-adminparticles" id="particles-js"></div>
<div class="row">
  <div class="col-sm-2 filler"></div>
  <div class="col-sm-8">
    <?php

    foreach ($sorted as $values) {
    ?>    
    <div class="posts-box">
    <p><?=$values["writer"]?></p>
    <p><?=$values["content"]?></p>
      <div class="votebox">
        <form action="/" method="post">
          <input type="hidden" name="id" value="<?=$values["id"]?>">
          <input class="upvote" type="image" src="img/arrow.png" alt="upvote_btn">
        </form>
        <p class="upvote-amount"><?=$values["likes"]?></p>
        <form action="/" method="post">
            <input type="hidden" name="id" value="<?=$values["id"]?>">
            <input type="submit" class="delete-btn" name="delete" value="delete">
        </form>
      </div>
    </div>

    <?php
    }
    ?>
    </div>
  <div class="col-sm-2 filler"></div>
</div> 
<?php
require "public/partials/adminfooter.php";
?>