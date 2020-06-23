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

function postController() {
    if (isset($_POST['writer'], $_POST['content'])) {
        $pdo = connectDB();
        try {
            addPost($pdo, $_POST['writer'], $_POST['content']);
            header("Location: /"); 
        } catch (PDOException $e){
            echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();
        }
    } else {
        require "views/newpost.view.php";
    }
}