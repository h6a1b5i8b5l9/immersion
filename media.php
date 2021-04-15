<?php
session_start();
include 'functions.php';
$pdo = new PDO("mysql:host=localhost;dbname=immersion", "root", "root");

$logged_user = is_email_in_db($_SESSION['email'], $pdo);
if(!isset($_SESSION['email'])) {
    redirect_to_page('login.php');
}




$avatar = $_FILES['avatar'];
$uploaddir = 'img/demo/avatars/';
$uniqid = uniqid();
$avatarPath = $uploaddir .$uniqid. basename($_FILES['avatar']['name']);







$user_id = $_GET['id'];



set_avatar($pdo, $user_id, $avatarPath);
upload_img($avatar, $avatarPath);


set_flash_message('success', 'Аватар пользователя обновлён!');
redirect_to_page("page_profile.php?id=$user_id");