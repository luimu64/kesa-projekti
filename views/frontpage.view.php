<?php
//if(isLoggedIn()){
//   require "public/partials/loggedhead.php";
// } else {
require "public/partials/header.php";
//}
?>

<div class="bg-particles" id="particles-js"></div>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <?php

    foreach ($allinfo as $values) {
    ?>    
    <div class="posts-box">
    <p><?=$values["writer"]?></p>
    <p><?=$values["content"]?></p>
    <img class="upvote" src="img/arrow.png" onclick="this.src='img/arrow_full.png';" alt="">
    <p><?=$values["likes"]?></p>
    </div>

    <?php
    }
    ?>
    </div>
  <div class="col-sm-2"></div>
</div> 

<script>
    particlesJS.load('particles-js', 'vendor/pjsconf.json',
    function(){
        console.log('particles.json loaded...')
    })
</script>