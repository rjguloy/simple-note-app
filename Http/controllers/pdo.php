<?php

$config = require_once "config.php";
// connect to the database and execute a query
$db = new Core\Database($config['database']);

$id = $_GET['id'];

// $query = "select * from posts where id = ?";
$query = "select * from posts where id = :id";

$post = $db->query($query, ['id' => $id])->FindOrFail();

dd($post);

foreach($posts as $post) {
    echo "<li>{$post['title']}</li>";
}