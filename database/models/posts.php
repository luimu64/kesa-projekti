<?php
function getAllPostsInfo($pdo) {
    $sql = "SELECT * FROM posts";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function addUpvote($pdo, $id) {
    $sql = "UPDATE posts SET likes = likes + 1 WHERE id = ?";
    $stm = $pdo->prepare($sql);
    return ($stm->execute($id));
}
?>