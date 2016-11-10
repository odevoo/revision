<?php 
require 'inc/db.php';
session_start();
 if (!empty($_POST)) {
  $errors =  array();


  if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Votre email n'est pas valide";
       $_SESSION['flash']['danger'] = "votre email n'est pas valide"; 
    header('location: index.php');
    exit();
  }else {
    $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
    $req->execute([$_POST['email']]);
    $email = $req->fetch();
    if ($email) {
      $errors['email'] = "Cet email est déjà associé à un compte";
    $_SESSION['flash']['danger'] = "Cet email est déjà associé à un compte"; 
    header('location: index.php');
    exit();
    }
  }

  if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
    $errors['password'] = "Votre mot de passe n'est pas valide";
    $_SESSION['flash']['danger'] = "votre mot de passe n'est pas valide"; 
    header('location: index.php');
    exit();
  }

  if (empty($errors)) {

    $req = $pdo->prepare('INSERT INTO users SET name = ?, firstname = ?, pwd = ?, address = ?, zip = ?, city = ?, email= ?');   
 
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $req->execute([$_POST['name'], $_POST['firstname'], $password, $_POST['address'], $_POST['zip'], $_POST['city'], $_POST['email']]);
  
    $user_id = $pdo->lastInsertId();
  
    $_SESSION['flash']['success'] = 'Votre compte a été créé';
    header('location: index.php');
    exit();
    
  }

}