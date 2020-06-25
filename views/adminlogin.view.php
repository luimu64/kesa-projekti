<?php
require "public/partials/header.php";
?>
<div class="bg-particles" id="particles-js"></div>
<div class="row">
  <div class="col-sm-3 filler"></div>
    <div class="col-sm-6">
        <form action="/admin" method="post">
            <input class="post-input" type="text" maxlength="20" name="username" placeholder="Username"><br>
            <input class="post-input" type="password" maxlength="60" name="password" placeholder="Password"><br>
            <input class="post-input" type="submit" value="Login">
        </form>
    </div>
  <div class="col-sm-3 filler"></div>
</div> 

<?php
require "public/partials/footer.php";
?>