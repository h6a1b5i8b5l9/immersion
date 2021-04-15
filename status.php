<?php
session_start();
include 'functions.php';
$pdo = new PDO("mysql:host=localhost;dbname=immersion", "root", "root");

$logged_user = is_email_in_db($_SESSION['email'], $pdo);
if(!isset($_SESSION['email'])) {
    redirect_to_page('login.php');
}

$user_id = $_GET['id'];

$status = $_POST['status'];

set_status($pdo, $user_id, $status);

$_SESSION['user_id'] = $user_id;


set_flash_message('success', 'Информация о пользователе обновлена!');
redirect_to_page("page_profile.php?id=$user_id");