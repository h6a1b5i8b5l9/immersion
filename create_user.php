<?php
session_start();
include 'functions.php';
$pdo = new PDO("mysql:host=localhost;dbname=immersion", "root", "root");

$logged_user = is_email_in_db($_SESSION['email'], $pdo);
if(!isset($_SESSION['email'])) {
    redirect_to_page('login.php');
}


$email = $_POST['new_email'];
$password = $_POST['new_password'];
$name = $_POST['name'];
$position = $_POST['position'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];
$vk = $_POST['vk'];
$telegram = $_POST['telegram'];
$instagram = $_POST['instagram'];

$avatar = $_FILES['avatar'];
$uploaddir = 'img/demo/avatars/';
$uniqid = uniqid();
$avatarPath = $uploaddir .$uniqid. basename($_FILES['avatar']['name']);




$task = is_email_in_db($email, $pdo);

if(!empty($task)) {
    set_flash_message('danger', 'Этот эл. адрес уже занят другим пользователем.');
    redirect_to_page('page_create_user.php');
}

create_new_user($pdo, $email, $password );

$new_user = is_email_in_db($email, $pdo);
$user_id = $new_user['id'];


set_common_info($pdo, $user_id, $name, $position, $address, $telephone);
set_avatar($pdo, $user_id, $avatarPath);
upload_img($avatar, $avatarPath);
set_soc_net($pdo, $user_id, $vk, $telegram, $instagram);

set_flash_message('success', 'Пользователь добавлен!');
redirect_to_page('users.php');