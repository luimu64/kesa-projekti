<?php
//if(isLoggedIn()){
//   require "public/partials/loggedhead.php";
// } else {
require "public/partials/header.php";
//}
?>

<div class="bg-particles" id="particles-js"></div>
<div class="row">
  <div class="col-sm-2 filler"></div>
  <div class="col-sm-8">
    <?php

    foreach ($allinfo as $values) {
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
      </div>
    </div>

    <?php
    }
    ?>
    </div>
  <div class="col-sm-2 filler"></div>
</div> 

<script>
    particlesJS.load('particles-js', 'vendor/pjsconf.json',
    function(){
        console.log('particles.json loaded...')
    })
</script>