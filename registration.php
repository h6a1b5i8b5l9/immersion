<?php
session_start();
include 'functions.php';

$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=immersion", "root", "root");

$task = is_email_in_db($email, $pdo);


if(!empty($task)) {
    set_flash_message('danger', 'Этот эл. адрес уже занят другим пользователем.');
    redirect_to_page('page_register.php');
}

create_new_user($pdo, $email, $password );

set_flash_message('success', 'Регистрация успешна');
redirect_to_page('page_login.php');