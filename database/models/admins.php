<?php


function login($pdo, $username, $password){
    $cleanusername = cleanUpInput($username);
    $sql = "SELECT * FROM admin WHERE username=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$cleanusername]);
    $user = $stm->fetch(PDO::FETCH_ASSOC);
    $hashedpassword = $user["password"];

    if($hashedpassword && password_verify($password, $hashedpassword))
        return $user;
    else 
        return false;
}


function deletePost($pdo, $id) {
    $cleanid = cleanUpInput($id);
    $sql = "DELETE FROM posts WHERE id = ?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$cleanid]);
}
?>