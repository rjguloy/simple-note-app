<?php

use Core\App;
use Core\Validator;
use Core\Database;


$errors = [];
$currentUserId = $_SESSION['user']['id'] ?? null;

if ( ! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if ( ! empty($errors)) {
    
    return view('notes/create.view.php', ['heading' => 'Create Note', 'errors' => $errors]);
}

App::resolve(Database::class)->query("INSERT INTO `notes` (`body`, `user_id`) VALUES (:body, :user_id)", [
    'body'      => $_POST['body'], 
    'user_id'   => $currentUserId
]);

redirect('/notes');