<?php
require_once "database/models/admins.php";

function adminController() {
    if(isset($_POST['username'], $_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pdo = connectDB();
        $result = login($pdo, $username, $password);
        if($result){
            $_SESSION['username'] = $result['username'];
            $_SESSION['id'] = $result['id'];
            $_SESSION['session_id'] = session_id();
            header("Location: /"); 
        } else {
            require "views/adminlogin.view.php";
        }
    } else {
        require "views/adminlogin.view.php";
    }
}

function adminFrontController() {
    if(isset($_POST['id'])){
        $pdo = connectDB();
        $id = $_POST['id'];
        deletePost($pdo, $id);
        $allinfo = getAllPostsInfo($pdo);
        $sorted = array_sort($allinfo, "likes");
        require "views/adminfrontpage.view.php";
    } else {
        $pdo = connectDB();
        $allinfo = getAllPostsInfo($pdo);
        $sorted = array_sort($allinfo, "likes");
        require "views/adminfrontpage.view.php";
    }
}

function logoutController(){
    session_unset();
    session_destroy();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
    header("Location: /");
    die();
}

?>