<?php
function getAllPostsInfo($pdo) {
    $sql = "SELECT * FROM posts";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}