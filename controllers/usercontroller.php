<?php

require_once "database/models/posts.php";

function indexController() {
    $pdo = connectDB();
    $allinfo = getAllPostsInfo($pdo);
    // $sorted = usort($myArray, function($a, $b) {
    // $retval = $a['order'] <=> $b['order'];
    // if ($retval == 0) {
    //     $retval = $a['suborder'] <=> $b['suborder'];
    //     if ($retval == 0) {
    //         $retval = $a['details']['subsuborder'] <=> $b['details']['subsuborder'];
    //     }
    // }
    // return $retval;
    // });
    // echo $sorted;
    require "views/frontpage.view.php";
}


function upvoteController() {
    $pdo = connectDB();
    $id = $_POST['id'];
    addUpvote($pdo, $id);
    $allinfo = getAllPostsInfo($pdo);
    // $sorted = usort($allinfo, function($a, $b) {
    //     return $a['likes'] <=> $b['likes'];
    // });
    require "views/frontpage.view.php";
}