<?php


function is_email_in_db($email, $pdo) {
    $sql = "SELECT * FROM registration WHERE email=:email";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email'=>$email]);
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
    $sql = "INSERT INTO registration (email, password) VALUES (:email, :password)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email'=>$email, 'password'=>$password]);
}