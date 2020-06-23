<?php
require "public/partials/header.php";
?>
<div class="bg-particles" id="particles-js"></div>
<div class="row">
  <div class="col-sm-3 filler"></div>
    <div class="col-sm-6">
        <form action="/add_post" method="post">
            <input class="post-input" type="text" maxlength="20" name="writer" placeholder="Your name..."><br>
            <textarea class="post-input" name="content" maxlength="300" cols="30" rows="10" placeholder="Your content..."></textarea><br>
            <input class="post-input" type="submit" value="Publish!">
        </form>
    </div>
  <div class="col-sm-3 filler"></div>
</div> 

<?php
require "public/partials/footer.php";
?>