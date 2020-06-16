<?php
//if(isLoggedIn()){
//   require "public/partials/loggedhead.php";
// } else {
require "public/partials/header.php";
//}
?>

<div class="bg-particles" id="particles-js"></div>

<script>
    particlesJS.load('particles-js', 'vendor/pjsconf.json',
    function(){
        console.log('particles.json loaded...')
    })
</script>