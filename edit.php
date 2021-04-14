<?php
session_start();
include 'functions.php';
$pdo = new PDO("mysql:host=localhost;dbname=immersion", "root", "root");

//$logged_user = is_email_in_db($_SESSION['email'], $pdo);
//if(!isset($logged_user)) {
//    redirect_to_page('login.php');
//}

$user_id = $_GET['id'];


$name = $_POST['update_name'];
$position = $_POST['update_position'];
$telephone = $_POST['update_telephone'];
$address = $_POST['update_address'];

set_common_info($pdo, $user_id, $name, $position, $address, $telephone);

$_SESSION['user_id'] = $user_id;


set_flash_message('success', 'Информация о пользователе обновлена!');
redirect_to_page('page_profile.php');