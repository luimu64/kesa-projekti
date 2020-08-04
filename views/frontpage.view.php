<?php
$currentsite = "posts";
if (isLoggedIn()) require "public/partials/adminheader.php";
else require "public/partials/header.php";
?>
<div class="bg-particles" id="particles-js"></div>
<div class="row">
  <div class="col-sm-2 filler"></div>
  <div class="col-sm-8">
    <?php

    foreach ($sorted as $values) {
    ?>    
    <div class="posts-box">
    <p><?=$values["writer"]?></p>
    <p><?=$values["content"]?></p>
    <?php
    if ($values["img"] != "") {
    ?>
      <img class="post_img" src="<?=$values["img"]?>" alt="Post's image">
    <?php
    };
    ?>
      <div class="votebox">
        <form action="/" method="post" onsubmit="updoot()">
          <input type="hidden" name="id" value="<?=$values["id"]?>">
          <input class="upvote" type="image" src="img/arrow.png" alt="upvote_btn">
        </form>
        <p class="upvote-amount"><?=$values["likes"]?></p>
      </div>
    </div>

    <?php
    }
    ?>
    </div>
  <div class="col-sm-2 filler"></div>
</div> 
<?php
if (isLoggedIn()) require "public/partials/adminfooter.php";
else require "public/partials/footer.php";
?>