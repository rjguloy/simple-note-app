<?php


use Core\App;
use Core\Validator;
use Core\Database;


$db = App::resolve(Database::class);

$errors = [];
$currentUserId = $_SESSION['user']['id'] ?? null;

if ( ! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if ( ! empty($errors)) {
    
    return view('notes/edit.view.php', ['heading' => 'Edit Note', 'errors' => $errors, 'note' => $_POST]);
}

$note = $db->query("select * from notes where id = :id", ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query("UPDATE `notes` SET `body` = :body WHERE `id` = :id AND `user_id` = :user_id", [
    'body'      => $_POST['body'], 
    'id'        => $_POST['id'],
    'user_id'   => $currentUserId
]);

header('Location: /notes');