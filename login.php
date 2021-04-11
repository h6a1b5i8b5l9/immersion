<?php
session_start();
include 'functions.php';


$email = $_POST['login_email'];
$password = $_POST['login_password'];

$pdo = new PDO("mysql:host=localhost;dbname=immersion", "root", "root");

$task = is_email_in_db($email, $pdo);

if(empty($task) || $password !== $task['password']) {
    set_flash_message('danger', 'Неверный эл. адрес и/или пароль!');
    redirect_to_page('page_login.php');
}else {
    $_SESSION['email'] = $email;
    redirect_to_page('users.php');
}
exit();