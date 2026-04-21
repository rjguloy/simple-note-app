<?php

use Core\App;
use Core\Authenticator;
use Core\Validator;
use Core\Database;

$errors = [];


if ( ! Validator::email($_POST['email'])) {
    $errors['email'] = 'Please provide a valid email address.';
}

if ( ! Validator::string($_POST['password'], 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}


if ( ! empty($errors)) {
    
    return view('registration/create.view.php', ['heading' => 'User Registration', 'errors' => $errors]);
}

$db = App::resolve(Database::class);

$user = $db->query('Select * FROM `users` WHERE `email` = :email', ['email' => $_POST['email']])->find();

if ($user) {
    redirect('/');
    exit();}

$db->query("INSERT INTO `users` (`email`, `password`) VALUES (:email, :password)", [
    'email'      => $_POST['email'], 
    'password'   => password_hash($_POST['password'], PASSWORD_BCRYPT)
]);

$user = $db->query('SELECT LAST_INSERT_ID() AS id')->find();

(new Authenticator())->login(['email' => $_POST['email'], 'id' => $user['id']]);

redirect('/');