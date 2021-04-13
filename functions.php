<?php


function is_email_in_db($email, $pdo) {
    $sql = "SELECT * FROM users WHERE email=:email";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email'=>$email]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function select_all_users($pdo) {
    $sql = "SELECT * FROM users";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function set_flash_message($name, $message) {
    return $_SESSION[$name] = $message;
}

function redirect_to_page($path) {
    header("Location: $path");
    exit();
}

function create_new_user($pdo, $email, $password) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email'=>$email, 'password'=>$password]);
}

function create_new_user2($pdo, $email, $password, $name, $id) {
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password) WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email'=>$email, 'password'=>$password, 'name'=>$name, 'id'=>$id]);
}

function update_new_user2($pdo, $email, $password, $address, $id) {
    $sql = "UPDATE users SET address=:address, email=:email, password=:password WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email'=>$email, 'password'=>$password, 'address'=>$address, 'id'=>$id]);
}



function set_common_info($pdo, $id, $name, $position, $address, $telephone, $avatar) {
    $sql = "UPDATE users SET name=:name, position=:position, address=:address, telephone=:telephone, avatar=:avatar WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['name'=>$name, 'position'=>$position, 'address'=>$address, 'telephone'=>$telephone, 'avatar'=>$avatar, 'id' => $id]);
}

function set_soc_net($pdo, $id, $vk, $telegram, $instagram) {
    $sql = "UPDATE users SET vk=:vk, telegram=:telegram, instagram=:instagram WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['vk'=>$vk, 'telegram'=>$telegram, 'instagram'=>$instagram, 'id' => $id]);
}

function upload_img($img, $path) {
    move_uploaded_file($img['tmp_name'], $path);
}