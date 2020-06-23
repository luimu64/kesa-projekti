<?php

require_once "database/models/posts.php";

function indexController() {
    $pdo = connectDB();
    $allinfo = getAllPostsInfo($pdo);
    $sorted = array_sort($allinfo, "likes");
    require "views/frontpage.view.php";
}


function upvoteController() {
    $pdo = connectDB();
    $id = $_POST['id'];
    addUpvote($pdo, $id);
    $allinfo = getAllPostsInfo($pdo);
    $sorted = array_sort($allinfo, "likes");
    require "views/frontpage.view.php";
}