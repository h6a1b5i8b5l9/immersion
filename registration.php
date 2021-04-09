<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];


$pdo = new PDO("mysql:host=localhost;dbname=immersion", "root", "root");


$sql = "SELECT * FROM registration WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute(['email'=>$email]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($task)) {
    $message = 'Этот эл. адрес уже занят другим пользователем.';
    $_SESSION['danger'] = $message;
    header('Location: page_register.php');
    exit();
}

$sql = "INSERT INTO registration (email, password) VALUES (:email, :password)";
$statement = $pdo->prepare($sql);
$statement->execute(['email'=>$email, 'password'=>$password]);
$message = 'Регистрация успешна';
$_SESSION['success'] = $message;
header('Location: page_login.php');