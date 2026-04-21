<?php 

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

if ( ! isset($_GET['id'])) abort();

$id = $_GET['id'];
$currentUserId = $_SESSION['user']['id'] ?? null;

$note = $db->query("select * from notes where id = :id", ['id' => $id])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', ['heading' => 'My Note', 'note' => $note]);
