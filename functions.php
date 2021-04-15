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

function get_user_by_id($id, $pdo) {
    $sql = "SELECT * FROM users WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id'=>$id]);
    return $statement->fetch(PDO::FETCH_ASSOC);
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





function set_common_info($pdo, $id, $name, $position, $address, $telephone) {
    $sql = "UPDATE users SET name=:name, position=:position, address=:address, telephone=:telephone WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['name'=>$name, 'position'=>$position, 'address'=>$address, 'telephone'=>$telephone, 'id' => $id]);
}

function set_avatar($pdo, $id, $avatar) {
    $sql = "UPDATE users SET avatar=:avatar WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['avatar'=>$avatar, 'id' => $id]);
}

function update_security($pdo, $id, $email, $password) {
    $sql = "UPDATE users SET email=:email, password=:password WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email'=>$email, 'password'=>$password, 'id' => $id]);
}

function set_soc_net($pdo, $id, $vk, $telegram, $instagram) {
    $sql = "UPDATE users SET vk=:vk, telegram=:telegram, instagram=:instagram WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['vk'=>$vk, 'telegram'=>$telegram, 'instagram'=>$instagram, 'id' => $id]);
}

function upload_img($img, $path) {
    move_uploaded_file($img['tmp_name'], $path);
}

function set_status($pdo, $id, $status) {
    $sql = "UPDATE users SET status=:status WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['status'=>$status, 'id' => $id]);
}

function delete_user($pdo, $id) {
    $sql = "DELETE FROM users WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id]);
}