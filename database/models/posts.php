<?php
function getAllPostsInfo($pdo) {
    $sql = "SELECT * FROM posts";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function addUpvote($pdo, $id) {
    $data = [$id];
    $sql = "UPDATE posts SET likes = likes + 1 WHERE id = ?";
    $stm = $pdo->prepare($sql);
    return ($stm->execute($data));
}

function addPost($pdo, $writer, $content) {
    $writer = cleanUpInput($writer);
    $content =  cleanUpInput($content);
    $data = [$writer, $content];
    $sql = "INSERT INTO posts (writer, content) VALUES(?,?)";
    $stm=$pdo->prepare($sql);
    return ($stm->execute($data));
} 

?>
