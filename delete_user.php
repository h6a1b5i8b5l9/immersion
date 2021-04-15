<?php
session_start();
include 'functions.php';
$pdo = new PDO("mysql:host=localhost;dbname=immersion", "root", "root");

$logged_user = is_email_in_db($_SESSION['email'], $pdo);
$user_id = $_GET['id'];

if(!isset($_SESSION['email'])) {
    redirect_to_page('login.php');
} elseif ($logged_user['role'] !== 'admin' && $logged_user['id'] !== $user_id) {
    redirect_to_page('users.php');
}

delete_user($pdo, $user_id);

if($logged_user['id'] != $user_id) {
    redirect_to_page("users.php");
}else {
    redirect_to_page("page_register.php");
}


