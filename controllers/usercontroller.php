<?php

require_once "database/models/posts.php";

function indexController() {
    $pdo = connectDB();
    $allinfo = getAllPostsInfo($pdo);
    require "views/frontpage.view.php";
}


function upvoteController() {
    $pdo = connectDB();
    addUpvote($pdo);
    require "views/frontpage.view.php";
}