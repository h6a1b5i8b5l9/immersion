<?php
session_start();
include 'functions.php';
$pdo = new PDO("mysql:host=localhost;dbname=immersion", "root", "root");

$logged_user = is_email_in_db($_SESSION['email'], $pdo);
if(!isset($_SESSION['email'])) {
    redirect_to_page('login.php');
}

$user_id = $_GET['id'];


$avatar = $_FILES['avatar'];
if($avatar['name'] == '') {
    set_flash_message('danger', 'Аватар пользователя не выбран!');
    redirect_to_page("page_media.php?id=$user_id");
}

$uploaddir = 'img/demo/avatars/';
$uniqid = uniqid();
$avatarPath = $uploaddir .$uniqid. basename($_FILES['avatar']['name']);











set_avatar($pdo, $user_id, $avatarPath);
upload_img($avatar, $avatarPath);


set_flash_message('success', 'Аватар пользователя обновлён!');
redirect_to_page("page_profile.php?id=$user_id");