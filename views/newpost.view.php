<?php
$currentsite = "newpost";
if (isLoggedIn()) require "public/partials/adminheader.php";
else require "public/partials/header.php";
?>
<div class="bg-particles" id="particles-js"></div>
<div class="row">
  <div class="col-sm-3 filler"></div>
    <div class="col-sm-6">
        <form enctype="multipart/form-data" action="/add_post" method="post">
            <input class="post-input" type="text" maxlength="20" name="writer" placeholder="Your username..."><br>
            <textarea class="post-input" name="content" maxlength="300" cols="30" rows="10" placeholder="Pour your mind here..."></textarea><br>
            <input class="post-input" type="file" name="post_image" id="post_image">
            <input class="post-input" type="submit" value="Publish!">
        </form>
    </div>
  <div class="col-sm-3 filler"></div>
</div> 

<?php
if (isLoggedIn()) require "public/partials/adminfooter.php";
else require "public/partials/footer.php";
?>