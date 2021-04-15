<?php
session_start();
include 'functions.php';
$pdo = new PDO("mysql:host=localhost;dbname=immersion", "root", "root");

$logged_user = is_email_in_db($_SESSION['email'], $pdo);
if(!isset($logged_user)) {
    redirect_to_page('login.php');
}

$user_id = $_GET['id'];


$email = $_POST['new_email'];
$password = $_POST['new_password'];

$task = is_email_in_db($email, $pdo);


if(!empty($task) && $task['email'] !== $email) {
    set_flash_message('danger', 'Этот эл. адрес уже занят другим пользователем.');
    redirect_to_page('page_security.php');
}

update_security($pdo, $user_id, $email, $password);





set_flash_message('success', 'Информация о пользователе обновлена!');
redirect_to_page("page_profile.php?id=$user_id");