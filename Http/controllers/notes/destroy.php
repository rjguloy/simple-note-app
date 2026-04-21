<?php 

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['id'] ?? null;

// form was submitted. delete the current note
$note = $db->query("select * from notes where id = :id", ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', ['id' => $_POST['id']]);

header('Location: /notes');
