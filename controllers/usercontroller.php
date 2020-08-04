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
        if (basename($_FILES["post_image"]["name"]) != "") {
            //pohja https://www.w3schools.com/php/php_file_upload.asp

            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo("/home/luimu/kesa-rpojekti/public/post_img/".basename($_FILES["post_image"]["name"]), PATHINFO_EXTENSION));
            $target_file = "post_img/".generateRandomString().".".$imageFileType;

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["post_image"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
            echo " Your image was not uploaded.";
            // if everything is ok, try to upload file

            } else {
                if (!(move_uploaded_file($_FILES["post_image"]["tmp_name"], PUBLIC_ROOT.$target_file))) {
                    $uploadOk = 1;
                }
            }
        }

        $pdo = connectDB();
        if ($_POST['writer'] != "" && $_POST['content'] != "" && $_FILES["post_image"]["name"] == "") {
            try {
                addPost($pdo, $_POST['writer'], $_POST['content']);
                header("Location: /"); 
            } catch (PDOException $e){
                echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();
            }
        } else if ($_POST['writer'] != "" && $_POST['content'] != "" && $_FILES["post_image"]["name"] != "" && $uploadOk == 1) {
            try {
                addPost($pdo, $_POST['writer'], $_POST['content'], $target_file);
                header("Location: /"); 
            } catch (PDOException $e){
                echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();
            }
        }
    } else {
        require "views/newpost.view.php";
    }
}

?>