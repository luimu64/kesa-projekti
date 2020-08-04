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

function addPost($pdo, $writer, $content, $img = "") {
    if ($img == "") {
        $writer = cleanUpInput($writer);
        $content =  cleanUpInput($content);
        $data = [$writer, $content];
        $sql = "INSERT INTO posts (writer, content) VALUES(?,?)";
        $stm=$pdo->prepare($sql);
        return ($stm->execute($data));
    } else {
        $writer = cleanUpInput($writer);
        $content =  cleanUpInput($content);
        $data = [$writer, $content, $img];
        $sql = "INSERT INTO posts (writer, content, img) VALUES(?,?,?)";
        $stm=$pdo->prepare($sql);
        return ($stm->execute($data));
    }
} 

?>
